<?php

namespace App\Http\Controllers\Admin\Vendor;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class VendorController extends Controller
{
    public function index(){

        $data['state'] = State::all();
        return view('admin.pages.vendor-add',['data'=>$data]);
    }

    public function store(Request $request)
    {
        $data = $request->except(['avatar','document']);
        $vendorData = $this->validateData($data,'create');
        if($vendorData->fails()){
            return response()->json($vendorData->errors());
        }

        $data['partner_details'] = json_encode($request->partner_details,true);
        $data['previous_product_details'] = json_encode($request->previous_product_details,true);
        $data['created_by'] = auth('web')->user()->id;

        $vendor = $this->recordSave(Vendor::class,$data,null,null);

        if($request->avatar !=null){
            $image = $this->fileUpload($request->avatar,$vendor,'local');
            $image['document_type']='avatar';
            $vendor->document()->create($image);
        }

        if($request->document !=null){
            foreach($request->document as $doc){
                $docs = $this->fileUpload($doc,$vendor,'local');
                $docs['document_type']='support_document';
                $vendor->document()->create($docs);
            }

        }

        return redirect()->back()->with(['message'=>'success']);
    }

    public function validateData($request,$type)
    {
        if($type == 'create'){
            $vendorData = Validator::make($request,
            [
                'name_of_establishment' => 'required',
                'establishment_type' => 'required',
                'pan' =>'required|unique:vendors,pan',
                'address' => 'required',
                'state' =>'required',
                'city' =>'required',
                'pincode' =>'required|numeric',
                'key_person' => 'required',
                'dob' => 'required',
                'mobile' => 'required|numeric',
                'email' => 'required',

            ]);
        }else{
            $vendorData = Validator::make($request,
            [
                'name_of_establishment' => 'required',
                'establishment_type' => 'required',
                'address' => 'required',
                'state' =>'required',
                'city' =>'required',
                'pincode' =>'required|numeric',
                'key_person' => 'required',
                'dob' => 'required',
                'mobile' => 'required|numeric',
                'email' => 'required',

            ]);

        }

        return $vendorData;
    }

    public function vendorList(Request $request)
    {
        if ($request->ajax()) {
            $vendors = Vendor::with('getState','getCity','creator')->limit(10)->latest();
            return DataTables::of($vendors)
                    ->addIndexColumn()
                    ->setRowId(function ($vendor) {
                        return 'row'.$vendor->id;
                    })
                    ->setRowId(function ($vendor) {
                        return 'SN'.$vendor->id;
                    })
                    ->addColumn('Business Name', function ($vendor) {
                        return $vendor->name_of_establishment;
                    })
                    ->addColumn('Establishment Type', function ($vendor) {
                        $type = $this->getEstablishmentType($vendor->establishment_type);
                        return $type;
                    })
                    ->addColumn('Pan', function ($vendor) {
                        return $vendor->pan ;
                    })
                    ->addColumn('Gst', function ($vendor) {
                        return $vendor->gst;
                    })
                    ->addColumn('Address', function ($vendor) {
                        return $vendor->address;
                    })
                    ->addColumn('Address', function ($vendor) {
                        return $vendor->address;
                    })
                    ->addColumn('City', function ($vendor) {
                        return $vendor->getCity->name;
                    })
                    ->addColumn('State', function ($vendor) {
                        return $vendor->getState->name;
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
                    ->addColumn('DOB', function ($vendor) {
                        return $vendor->dob;
                    })
                    ->addColumn('Marriage Aniversory', function ($vendor) {
                        return $vendor->marriage_aniversory;
                    })
                    ->addColumn('Created By', function ($vendor) {
                        return $vendor->creator->first_name;
                    })
                    ->addColumn('Created Date', function ($vendor) {
                        return $vendor->created_at;
                    })
                    ->addColumn('Status', function ($vendor) {
                        if($vendor->is_ative ==1){
                            $status ='Activated';
                        }else{
                            $status= 'Deactivate';
                        }
                        return $status;
                    })

                    ->addColumn('action', function($vendor){
                        if($vendor->is_ative ==1){
                            $status = 'Deactivate';
                        }else{
                            $status = 'Activate';
                        }
                        return '<div class="dropdown">
                                <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                <a class="dropdown-item" href="'.url('admin/vendor/edit/'.$vendor->id).'">Edit</a>
                                <a class="dropdown-item" href="'.url('admin/vendor/change-status/'.$vendor->id).'">'.$status.'</a>

                                </div>
                            </div>';

                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.pages.vendor-list');
    }

    public function edit($id){
        if($id!=null){
            $vendor = Vendor::find($id);
            $data['state'] = State::all();
            $data['vendor'] = $vendor;
            return view('admin.pages.vendor-edit',['data'=>$data]);
        }
    }

    public function update(Request $request){

        if($request->id !=null){
            // $vendor = Vendor::find($request->id);
            $data = $request->except(['avatar','document']);
            $vendorData = $this->validateData($data,'update');
            if($vendorData->fails()){
                return response()->json($vendorData->errors());
            }

            $data['partner_details'] = json_encode($request->partner_details,true);
            $data['previous_product_details'] = json_encode($request->previous_product_details,true);

            $vendor = $this->recordSave(Vendor::class,$data,null,null);

            if($request->avatar !=null){
                $image = $this->fileUpload($request->avatar,$vendor,'local');
                $image['document_type']='avatar';
                $vendor->document()->create($image);
            }

            if($request->document !=null){
                foreach($request->document as $doc){
                    $docs = $this->fileUpload($doc,$vendor,'local');
                    $docs['document_type']='support_document';
                    $vendor->document()->create($docs);
                }
            }

            return redirect()->back()->with(['message'=>'success']);
        }
    }

    public function changeStatus($id)
    {
        $vendor = Vendor::find($id);
        $vendor->save([
            'is_ative' => $vendor->is_ative ==1 ? 0 : 1,
        ]);

        return redirect()->back()->with(['message'=>'success']);
    }
}
