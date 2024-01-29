<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PackingSize;
use App\Models\Product;
use App\Models\State;
use App\Models\Unit;
use App\Models\Vendor;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public OrderService $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = $this->orderService->getAllOrders();
        if($request->ajax()){
            $orders = $this->orderService->getordersByFilter($request);
            return view('admin.pages.order.filter-order', compact('orders'))->render();
        }
        return view('admin.pages.order.list',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        $vendors = Vendor::all();
        $products = Product::all();
        $units = Unit::all();
        $packing_sizes = PackingSize::with('unit')->get();
        return view('admin.pages.order.add',compact('states','vendors','products','units','packing_sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data =  $request->validate([
            'customer_id' => 'numeric|between:0,9999999999.99',
            'customer_name' => 'required',
            'address' => 'required',
            'landmark' => 'required',
            'pincode' =>'required|min:5',
            'state_id' => 'required',
            'city_id' => 'required',
            'mobile' => 'required|min:10',
            'email' => 'required',
            'bill_amount' => 'required',

        ]);

        // $data['order_items'] = json_encode($request->order_items,true);

        $data['created_by'] = auth()->user()->id;
        $order = new Order();
        $order = $order->create($data);
        if($order){
            if($request->order_items !=null){
                foreach($request->order_items as $item){
                    $orderitem = new OrderItem();
                    $volArry = explode(" ",$item['volume']);
                    $item['volume'] = $volArry[0];
                    $item['unit'] = $volArry[1];
                    $item['unit_price'] = $item['price']/$item['quantity'];
                    $item['total_price'] = $item['price'];
                    $item['order_id'] = $order->id;
                    unset($item['price']);
                    $orderitem->create($item);
                }
            }
            return redirect()->route('order.index')->with('success','Order added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        if($order){
            $order->delete();
            return ok($order,'Order Deleted successfully');
        }
    }

    public function getpackingsize($id){
        return PackingSize::with('unit')->where('product_id',$id)->get();
    }

    public function cancelOrder($id)
    {
        $order = Order::findOrFail($id);
        $value = !$order->is_cancelled;
        $order->update([
            'is_cancelled' => (int) $value,
        ]);

        return ok($order,'Order Status successfully');
    }
}
