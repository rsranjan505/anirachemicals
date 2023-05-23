<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExportOrders;
use App\Exports\ExportVisits;
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
            'pincode' =>'required',
            'key_person' => 'required',
            'mobile' => 'required|min:10',
            'email' => 'required',
            'status' => 'required',
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

        return redirect()->back()->with(['success'=>'Visit has been successfully created']);
    }

    public function visitList(Request $request)
    {

        if ($request->ajax()) {

            if(auth()->user()->user_type == 'admin'){
                $visits = Visit::with('state','city','creator','image')->latest();
            }else{
                $visits = Visit::where('created_by',auth()->user()->id)->with('state','city','creator','image')->latest();
            }

            return DataTables::of($visits)
                    ->addIndexColumn()
                    ->setRowId(function ($vendor) {
                        return 'row'.$vendor->id;
                    })
                    ->addColumn('Image', function ($vendor) {
                        $img = $vendor->image !=null ? $vendor->image->url : 'http://anirachemicals.com/admin/assets/images/accounticon.png';
                        return ' <td class="py-1">
                                    <img id="imgV'.$vendor->id.'" onclick="imageView('.$vendor->id.')" src="'.$img.'" alt="image" data-mdb-img="'.$img.'"
                                    alt="visiting image"
                                    class="w-100"/>
                                </td>';
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
                        if($vendor->status ==1){
                            $statucss = '<label class="badge badge-warning">Open - Not Contacted</label>' ;
                        }else if($vendor->status ==2){
                            $statucss = '<label class="badge badge-info">Working - Contacted</label>' ;
                        }else if($vendor->status ==3){
                            $statucss = '<label class="badge badge-success">Closed - Converted</label>' ;
                        }else if($vendor->status ==4){
                            $statucss = '<label class="badge badge-danger">Closed - Not Converted</label>' ;
                        }

                        return $statucss;
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

                                <a class="dropdown-item" href="'.url('admin/visit-update/'.$vendor->id).'">Edit</a>
                                <a class="dropdown-item" href="'.url('admin/visit/change-status/'.$vendor->id).'">'.$status.'</a>

                                </div>
                            </div>';

                    })
                    ->rawColumns(['Image','Status','action'])
                    // ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.pages.visit-list');
    }

    public function edit($id){
        if($id!=null){
            $visit = Visit::with('state','city','creator','image')->find($id);
            $data['state'] = State::all();
            $data['city'] = City::all();
            $data['visit'] = $visit;
            return view('admin.pages.visit-edit',['data'=>$data]);
        }
    }

    public function update(Request $request){

        if($request->id !=null){
            // $vendor = Vendor::find($request->id);
            $data = $request->except(['avatar']);
            //Validated
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
                'status' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
            ]);

            $order = $this->recordSave(Order::class,$data,null,null);

            return redirect()->back()->with(['message'=>'success']);
        }
    }

    public function exportVisit(Request $request){
        return Excel::download(new ExportVisits, 'visits.csv');
    }
}
