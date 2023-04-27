<?php

namespace App\Http\Controllers\Admin;

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
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class VisitController extends Controller
{
    public function index()
    {
        $data['state'] = State::all();
        return view('admin.pages.visit-add',['data'=>$data]);
    }

     /**
     * Create User
     * @param Request $request
     * @return Order
     */
    public function createVisit(Request $request)
    {
        $data = $request->except(['avatar']);
        $request->validate([
            'name_of_establishment' => 'required',
            'establishment_type' => 'required',
            'address' => 'required',
            'state_id' =>'required',
            'city_id' =>'required',
            'pincode' =>'required|min:5',
            'key_person' => 'required',
            'mobile' => 'required|min:10',
            'email' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $data['created_by'] = auth()->user()->id;
        $visit = $this->recordSave(Visit::class,$data,null,null);

        if($request->avatar !=null){
            $image = $this->fileUpload($request->avatar,$visit,'local');
            $image['document_type']='avatar';
            $visit->document()->create($image);
        }

        return redirect()->back()->with(['success'=>'created']);
    }

    public function visitList(Request $request)
    {
        if ($request->ajax()) {

            if(auth()->user()->user_type == 'admin'){
                $vendors = Visit::with('state','city','creator')->limit(10)->latest();
            }else{
                $vendors = Visit::where('created_by',auth()->user()->id)->with('state','city','creator')->limit(10)->latest();
            }

            return DataTables::of($vendors)
                    ->addIndexColumn()
                    ->setRowId(function ($vendor) {
                        return 'row'.$vendor->id;
                    })
                    ->addColumn('Business Name', function ($vendor) {
                        return $vendor->name_of_establishment;
                    })
                    ->addColumn('Establishment Type', function ($vendor) {
                        $type = getEstablishmentType($vendor->establishment_type);
                        return $type;
                    })

                    ->addColumn('Address', function ($vendor) {
                        return $vendor->address;
                    })

                    ->addColumn('City', function ($vendor) {
                        return $vendor->city ? $vendor->city->name : '';
                    })
                    ->addColumn('State', function ($vendor) {
                        return $vendor->state ? $vendor->state->name : '';
                    })
                    ->addColumn('Pincode', function ($vendor) {
                        return $vendor->pincode;
                    })
                    ->addColumn('Email', function ($vendor) {
                        return $vendor->email;
                    })
                    ->addColumn('Mobile', function ($vendor) {
                        return $vendor->mobile;
                    })
                    ->addColumn('Key Person', function ($vendor) {
                        return $vendor->key_person;
                    })
                    ->addColumn('Status', function ($vendor) {
                        return $vendor->status;
                    })
                    ->addColumn('Source', function ($vendor) {
                        return $vendor->source;
                    })
                    ->addColumn('Created By', function ($vendor) {
                        return $vendor->creator->first_name;
                    })
                    ->addColumn('Created Date', function ($vendor) {
                        return $vendor->created_at;
                    })

                    ->addColumn('action', function($vendor){
                        if($vendor->is_active ==1){
                            $status = 'Deactivate';
                        }else{
                            $status = 'Activate';
                        }
                        return '<div class="dropdown">
                                <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                <a class="dropdown-item" onClick="openModelpartner('.$vendor->id.')" href="#">Partner Details</a>
                                <a class="dropdown-item" onClick="openModelpreProducts('.$vendor->id.')" href="#">Previous Products</a>
                                <a class="dropdown-item" href="'.url('admin/vendor-update/'.$vendor->id).'">Edit</a>
                                <a class="dropdown-item" href="'.url('admin/vendor/change-status/'.$vendor->id).'">'.$status.'</a>

                                </div>
                            </div>';

                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.pages.visit-list');
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
            return view('admin.pages.visit-edit',['data'=>$data]);
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

    public function exportOrder(Request $request){
        return Excel::download(new ExportOrders, 'visits.csv');
    }
}
