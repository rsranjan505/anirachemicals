<?php

namespace App\Http\Controllers\Admin\Order;

use App\Exports\ExportOrders;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PackingSize;
use App\Models\Product;
use App\Models\State;
use App\Models\Unit;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function index()
    {
        $data['state'] = State::all();
        $data['vendor'] = Vendor::all();
        $data['product'] = Product::all();
        $data['unit'] = Unit::all();
        $data['packing_size'] = PackingSize::all();
        return view('admin.pages.order.add',['data'=>$data]);
    }

     /**
     * Create User
     * @param Request $request
     * @return Order
     */
    public function createOrder(Request $request)
    {
        $data = $request->except(['product','product_id','quantity','unit','unit_price','total_price']);
        $request->validate([
            'customer_name' => 'required|string',
            'email' => 'required',
            'mobile' =>'required',
            'address' => 'required',
            'state_id' =>'required',
            'city_id' =>'required',
            'pincode' =>'required',
        ]);

        $data['created_by'] = auth()->user()->id;
        $order = $this->recordSave(Order::class,$data,null,null);

        $products = $request->product;

        foreach($products as $key=> $product){
            $pos=strpos($product['product_id'],'#');
            $product_id = substr($product['product_id'],0,$pos);
            $orderItem = new OrderItem();
            $product['product_id'] = $product_id;
            $product['customer_id'] = $request->customer_id??null;
            $product['order_id'] = $order->id;
            $orderItem->create($product);
        }
        return redirect()->back()->with(['success'=>'created']);
    }

    public function orderList(Request $request)
    {
        if ($request->ajax()) {
            if(auth()->user()->user_type == 'admin'){
                $orders = Order::with('customer','state','city','creator','orderItems')->limit(10)->latest();
            }else{
                $orders = Order::where('created_by',auth()->user()->id)->with('customer','state','city','creator','orderItems')->limit(10)->latest();
            }

            return DataTables::of($orders)
                    ->addIndexColumn()
                    ->setRowId(function ($order) {
                        return 'row'.$order->id;
                    })
                    ->addColumn('Customer Name', function ($order) {
                        return $order->customer_name;
                    })
                    ->addColumn('Order Date', function ($order) {
                        return $order->created_at;
                    })
                    ->addColumn('Email', function ($order) {
                        return $order->email;
                    })
                    ->addColumn('Mobile', function ($order) {
                        return $order->mobile;
                    })
                    ->addColumn('Address', function ($order) {
                        return $order->address;
                    })
                    ->addColumn('City', function ($order) {
                        return $order->city ? $order->city->name : '';
                    })
                    ->addColumn('Pincode', function ($order) {
                        return $order->pincode;
                    })
                    ->addColumn('Is Delivered', function ($order) {
                        return $order->is_delivered == 1 ? 'Yes' : 'No';
                    })
                    ->addColumn('Delivered Date', function ($order) {
                        return $order->delivered_date??'';
                    })
                    ->addColumn('Created By', function ($order) {
                        return $order->creator->first_name;
                    })
                    ->addColumn('Status', function ($user) {
                        if($user->is_active ==1){
                            $status ='Activated';
                        }else{
                            $status= 'Deactivate';
                        }
                        return $status;
                    })

                    ->addColumn('action', function($order){
                        if($order->is_ative ==1){
                            $status = 'Deactivate';
                        }else{
                            $status = 'Activate';
                        }
                        return '<div class="dropdown">
                                <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                <a class="dropdown-item" onClick="openModel('.$order->id.')" href="#">View Items</a>
                                <a class="dropdown-item" onClick="deliveredModel('.$order->id.')"  href="#">Delivered</a>
                                <a class="dropdown-item" href="'.url('admin/order-update/'.$order->id).'">Edit</a>
                                <a class="dropdown-item" href="'.url('admin/order/change-status/'.$order->id).'">'.$status.'</a>

                                </div>
                            </div>';

                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.pages.order.list');
    }

    public function edit($id){
        if($id!=null){
            $order = Order::with('orderItems')->find($id);
            $data['state'] = State::all();
            $data['city'] = City::all();
            $data['vendor'] = Vendor::all();
            $data['product'] = Product::all();
            $data['unit'] = Unit::all();
            $data['packing_size'] = PackingSize::all();
            $data['order'] = $order;
            return view('admin.pages.order.edit',['data'=>$data]);
        }
    }

    public function update(Request $request){

        if($request->id !=null){
            // $vendor = Vendor::find($request->id);
            $data = $request->except(['avatar']);
            //Validated
            $request->validate([
                'customer_name' => 'required|string',
                'email' => 'required',
                'mobile' =>'required',
                'address' => 'required',
                'state_id' =>'required',
                'city_id' =>'required',
                'pincode' =>'required',
                'quantity'=>'required',
                'unit'=>'required',
                'unit_price'=>'required',
                'total_price'=>'required',
            ]);

            $order = $this->recordSave(Order::class,$data,null,null);

            return redirect()->back()->with(['message'=>'success']);
        }
    }

    //Ajax edit form
    public function ajaxOrderItemShow($id){
        $items = OrderItem::where('order_id',$id)->with('customer','product')->get();
        return response()->json($items);
    }

    //get details by vendor id
    public function getVendorId($id)
    {
        if($id!=null){
            $vendor = Vendor::find($id);
        }
        return response()->json([
            'status' => true,
            'vendor' => $vendor
        ], 200);
    }

    public function orderdelivered(Request $request)
    {
        if($request->id!=null){
            $order = Order::find($request->id);
            $order->update([
                'is_delivered' => 1,
                'delivered_date' => $request->delivered_date,
            ]);
        }
        return redirect()->back()->with(['message'=>'success']);
    }




    public function exportOrder(Request $request){
        return Excel::download(new ExportOrders, 'orders.csv');
    }
}
