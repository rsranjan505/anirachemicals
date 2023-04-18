<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        $data['state'] = State::all();
        return view('admin.pages.product.add',['data'=>$data]);
    }

     /**
     * Create User
     * @param Request $request
     * @return User
     */
    public function createProduct(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(),
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'mobile' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $request['password'] = Hash::make($request->password);

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile' => $request->mobile,
                'role_id' => $request->role_id,
                'user_type' => $request->user_type,
                'address' => $request->address,
                'state_id ' => $request->state_id,
                'city_id ' => $request->city_id,
                'pincode' => $request->pincode,
                'is_active' => $request->is_active,
                'is_admin ' => $request->is_admin,
                'email' => $request->email,
                'password' => $request['password']
            ]);


            return redirect()->back()->with(['success'=>'created']);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function validateData($request,$type)
    {
        if($type == 'create'){
            $data = Validator::make($request,
            [
                'name' => 'required|string',
                'code' => 'required|unique:products,code',
                'brand' =>'required',
                'form' => 'required',
                'type' =>'required',
                'packaging_size' =>'required',
                'description' =>'required',
            ]);
        }else{
            $data = Validator::make($request,
            [
                'name' => 'required|string',
                'brand' =>'required',
                'form' => 'required',
                'type' =>'required',
                'packaging_size' =>'required',
                'description' =>'required',

            ]);

        }
        return $data;
    }

    public function productList(Request $request)
    {
        if ($request->ajax()) {
            $users = User::with('image','state','city')->limit(10)->latest();
            return DataTables::of($users)
                    ->addIndexColumn()
                    ->setRowId(function ($user) {
                        return 'row'.$user->id;
                    })
                    ->setRowId(function ($user) {
                        return 'SN'.$user->id;
                    })
                    ->addColumn('First Name', function ($user) {
                        return $user->first_name;
                    })
                    ->addColumn('Last Name', function ($user) {

                        return $user->last_name;
                    })
                    ->addColumn('Email', function ($user) {
                        return $user->email;
                    })
                    ->addColumn('Mobile', function ($user) {
                        return $user->mobile;
                    })
                    ->addColumn('User Type', function ($user) {
                        return $user->user_type ;
                    })
                    ->addColumn('Address', function ($user) {
                        return $user->address;
                    })
                    ->addColumn('City', function ($user) {
                        return $user->city ? $user->city->name : '';
                    })
                    ->addColumn('State', function ($user) {
                        return $user->state ? $user->state->name : '';
                    })
                    ->addColumn('Pincode', function ($user) {
                        return $user->pincode;
                    })
                    ->addColumn('Created Date', function ($user) {
                        return $user->created_at;
                    })
                    ->addColumn('Status', function ($user) {
                        if($user->is_active ==1){
                            $status ='Activated';
                        }else{
                            $status= 'Deactivate';
                        }
                        return $status;
                    })

                    ->addColumn('action', function($user){
                        if($user->is_ative ==1){
                            $status = 'Deactivate';
                        }else{
                            $status = 'Activate';
                        }
                        return '<div class="dropdown">
                                <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                <a class="dropdown-item" href="'.url('admin/user/edit/'.$user->id).'">Edit</a>
                                <a class="dropdown-item" href="'.url('admin/user/change-status/'.$user->id).'">'.$status.'</a>

                                </div>
                            </div>';

                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.pages.users.list');
    }

    public function edit($id){
        if($id!=null){
            $user = User::find($id);
            $data['state'] = State::all();
            $data['user'] = $user;
            return view('admin.pages.product.edit',['data'=>$data]);
        }
    }

    public function update(Request $request){

        if($request->id !=null){
            // $vendor = Vendor::find($request->id);
            $data = $request->except(['avatar']);
            //Validated
            $validateUser = Validator::make($request->all(),
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'mobile' => 'required|min:10',
            ]);

            // if($validateUser->fails()){
            //     return redirect()->back()->with(['error'=>$validateUser->errors()]);
            // }

            $user = $this->recordSave(User::class,$data,null,null);

            if($request->avatar !=null){
                $image = $this->fileUpload($request->avatar,$user,'local');
                $image['document_type']='avatar';
                $user->image()->create($image);
            }

            return redirect()->back()->with(['message'=>'success']);
        }
    }
}
