<?php

namespace App\Http\Controllers\Admin\Vendor;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    public function index(){

        $data['state'] = State::all();
        return view('admin.pages.vendor-add',['data'=>$data]);
    }

    public function store(Request $request)
    {
        $data = $request->except(['avatar','document']);
        $vendorData = $this->validateData($data);
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

    public function validateData($request){

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

        return $vendorData;
    }
}
