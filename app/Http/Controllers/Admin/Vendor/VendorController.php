<?php

namespace App\Http\Controllers\Admin\Vendor;

use App\Exports\ExportVendors;
use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\Vendor;
use App\Services\VendorService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class VendorController extends Controller
{
    public VendorService $vendorService;
    public function __construct(VendorService $vendorService)
    {
        $this->vendorService = $vendorService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vendors = $this->vendorService->getAllvendors();
        $states = State::all();
        if($request->ajax()){
            $vendors = $this->vendorService->getvendorsByFilter($request);
            return view('admin.pages.vendor.filter-vendor', compact('vendors','states'))->render();
        }
        return view('admin.pages.vendor.list',compact('vendors','states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('admin.pages.vendor.add',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_of_establishment' => 'required',
            'establishment_type' => 'required',
            'pan' =>'required|unique:vendors,pan',
            'address' => 'required',
            'state_id' =>'required',
            'city_id' =>'required',
            'pincode' =>'required|min:5',
            'key_person' => 'required',
            'dob' => 'required|date',
            'mobile' => 'required|min:10',
            'email' => 'required',
        ]);

        $data = $request->except(['avatar','document']);
        $data['partner_details'] = json_encode($request->partner_details,true);
        $data['previous_product_details'] = json_encode($request->previous_product_details,true);

        $data['created_by'] = auth()->user()->id;

        $vendor = new Vendor();
        $vendor = $vendor->create($data);

        if($vendor){
            if($request->avatar !=null){
                $image = $this->fileUpload($request->avatar,$vendor,'local');
                $image['document_type']='avatar';
                $vendor->image()->create($image);
            }
            return redirect()->route('vendor.index')->with('success','Vendor added Successfully');
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
        $vendor = Vendor::findOrFail($id);
        if($vendor){
            $vendor->delete();
            return ok($vendor,'Vendor Deleted successfully');
        }
    }

    public function changeStatus($id)
    {
        $vendor = Vendor::findOrFail($id);
        $value = !$vendor->is_active;
        $vendor->update([
            'is_active' => (int) $value,
        ]);

        return ok($vendor,'Status Changed successfully');
    }

    //Export data
    public function exportVisit(Request $request){
        // return Json(new { Result = "true", Message = "Success", FileName = fname,Entity=entityvalue });
        if(Auth::check()){
            return Excel::download(new ExportVendors($request,$this->vendorService), 'vendors.csv');
        }
        return redirect()->route('vendor.index')->with('danger','Unauthorized access');
    }

    public function findById($id){
        $vendor = Vendor::with('state','city')->where('id',$id)->first();
        return  $vendor;
    }
}
