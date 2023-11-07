<?php

namespace App\Http\Controllers\Admin\Visit;

use App\Exports\ExportVisits;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use App\Models\Visit;
use App\Services\VisitService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class VisitController extends Controller
{
    public VisitService $visitService;
    public function __construct(VisitService $visitService)
    {
        $this->visitService = $visitService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $visits = $this->visitService->getAllVisits();
        $states = State::all();
        if($request->ajax()){
            $visits = $this->visitService->getVisitsByFilter($request);
            return view('admin.pages.visit.filter-visit', compact('visits','states'))->render();
        }
        return view('admin.pages.visit.list',compact('visits','states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('admin.pages.visit.add',compact('states'));
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
            'address' => 'required',
            'state_id' =>'required',
            'city_id' =>'required',
            'pincode' =>'required',
            'key_person' => 'required',
            'mobile' => 'required|min:10',
            'email' => 'required',
            'status' => 'required',
            'avatar' => 'required',
        ]);

        if(!$this->triphoto_getGPS($request->avatar)){
            return redirect()->route('visit.create')->with('warning','Image Geo Tag not enabled, Please enable geo tag');
        }

        $geo = $this->triphoto_getGPS($request->avatar);

        $data = $request->except(['avatar']);
        $data['created_by'] = auth()->user()->id;
        $data['latitude'] = in_array('latitude',$this->triphoto_getGPS($request->avatar)) ? $geo['latitude'] : $data['latitude'];
        $data['longitude'] = in_array('longitude',$this->triphoto_getGPS($request->avatar)) ? $geo['longitude'] : $data['longitude'];
        $visit = new Visit();
        $visit = $visit->create($data);
        if($visit){
            if($request->avatar !=null){
                $image = $this->fileUpload($request->avatar,$visit,'local');
                $image['document_type']='avatar';
                $visit->image()->create($image);
            }
            return redirect()->route('visit.index')->with('success','Visit added Successfully');
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
        $visit = Visit::with('state','city','creator','image')->find($id);
        $states = State::all();
        $cities = City::all();
        return view('admin.pages.visit.edit',compact('visit','states','cities'));
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
        $data = $request->except(['avatar']);
        $visit = Visit::findOrFail($id);
        $visit->update($data);
        if($visit){
            return redirect()->route('visit.index')->with(['success'=>'Visit Has been successfully updated']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visit = Visit::findOrFail($id);
        if($visit){
            $visit->delete();
            return ok($visit,'Visit Deleted successfully');
        }
    }

    public function changeStatus($id)
    {
        $visit = Visit::findOrFail($id);
        $value = !$visit->is_active;
        $visit->update([
            'is_active' => (int) $value,
        ]);
        return ok($visit,'Status Changed successfully');
    }

    public function statusUpdate(Request $request)
    {
        $visit = Visit::findOrFail($request->id);
        $visit->status = $request->status;
        $visit->save();
        if($visit->save()){
            $this->visitService->createStatusLog($visit,$request->all());
        }
        return redirect()->route('visit.index')->with('success','Visit Status Updated successfully');
    }

    //Export data
    public function exportVisit(Request $request){
        // return Json(new { Result = "true", Message = "Success", FileName = fname,Entity=entityvalue });
        if(Auth::check()){
            return Excel::download(new ExportVisits($request,$this->visitService), 'visits.csv');
        }
        return redirect()->route('visit.index')->with('danger','Unauthorized access');
    }
}
