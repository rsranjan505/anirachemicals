<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CityController extends Controller
{
    //
    public function getCity($id){
       $city = City::where('state_id',$id)->get();
       return $city;
    }

               /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cityList(Request $request)
    {

        $states = State::all();

        if ($request->ajax()) {
            // dd($request->state_id);
            $cities = City::where('state_id',$request->state_id)->get();

            return DataTables::of($cities)
            ->addIndexColumn()
            ->setRowId(function ($city) {
                return 'row'.$city->id;
            })
            ->addColumn('State', function ($city) {
                return $city->state !=null ? $city->state->name :'';
            })
            ->addColumn('City Name', function ($city) {
                return $city->name;
            })

            // ->addColumn('action', function($city){
            //     if($city->is_active ==1){
            //         $status = 'Deactivate';
            //     }else{
            //         $status = 'Activate';
            //     }
            //     return '<div class="dropdown">
            //             <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            //             </button>
            //             <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
            //             <a class="dropdown-item" onClick="editModel('.$city->id.')" href="#">Edit</a>
            //             <a class="dropdown-item" href="'.url('city/change-status/'.$city->id).'">'.$status.'</a>

            //             </div>
            //         </div>';

            // })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.pages.city.list',['states' => $states]);

    }

    // public function createCity(Request $request)
    // {
    //     if($request->id !=null){
    //         $request->validate([
    //             'name' => 'required|unique:cities,name,'.$request->id.',id',
    //         ]);
    //     }else{
    //         $request->validate([
    //             'name' => 'required|unique:cities,name',
    //         ]);
    //     }

    //     $this->recordSave(City::class,$request->all(),null,null);
    //     if($request->id !=null){
    //         return redirect()->back()->with(['success'=>'City Has been updated successfully.']);
    //     }
    //     return redirect()->back()->with(['success'=>'City Has been created successfully.']);
    // }

    public function index()
    {
        $states = State::all();
        return view('admin.pages.city.add',['states'=>$states]);
    }

         /**
     * Create User
     * @param Request $request
     * @return Order
     */
    public function createCity(Request $request)
    {

        $request->validate([
            'state_id' => 'required|numeric',
            'name' => 'required|unique:cities,name,'.$request->state_id.',id',
        ]);
        $data = $request->all();
        $data['name']= ucfirst($request->name);

        $this->recordSave(City::class,$data,null,null);

        return redirect()->back()->with(['success'=>'City Has been successfully added']);
    }

    // public function edit($id){
    //     if($id!=null){
    //         $visit = City::with('state','city','creator','image')->find($id);
    //         $data['state'] = State::all();
    //         $data['city'] = City::all();
    //         $data['visit'] = $visit;
    //         return view('admin.pages.city.edit',['data'=>$data]);
    //     }
    // }

    public function update(Request $request){

        if($request->id !=null){
            // $vendor = Vendor::find($request->id);
            $data = $request->except(['avatar']);
            //Validated
            $request->validate([
                'name_of_establishment' => 'required',
                'establishment_type' => 'required',
            ]);

            $order = $this->recordSave(Order::class,$data,null,null);

            return view('admin.pages.city.add')->with(['success'=>'City Has been updated successfully']);
        }
    }

    public function changeStatus($id)
    {
        $city = City::find($id);
        $value = !$city->is_active;
        $city->update([
            'is_active' => (int) $value,
        ]);

        return view('admin.pages.city.list')->with(['success'=>'city status change successfully.']);
    }

}
