<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        $data['state'] = State::all();

        return view('admin.pages.users.add',['data'=>$data]);
    }

     /**
     * Create User
     * @param Request $request
     * @return User
     */
    public function createUser(Request $request)
    {
        try {
            //Validated
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'mobile' => 'required|min:10',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ]);

            $request['password'] = Hash::make($request->password);
            if(auth()->user()->user_type == 'admin'){
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
                if($request->avatar !=null){
                    $image = $this->fileUpload($request->avatar,$user,'local');
                    $image['document_type']='avatar';
                    $user->image()->create($image);
                }

                return redirect()->back()->with(['success'=>'created']);
            }
            return redirect()->back()->with(['success'=>'You do not have permission ']);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function userList(Request $request)
    {
        if ($request->ajax()) {

            if(auth()->user()->user_type == 'admin'){
                $users = User::with('image','state','city','image')->limit(10)->latest();
            }else{
                $users = User::where('id',auth()->user()->id)->with('image','state','city','image')->limit(10)->latest();
            }

            return DataTables::of($users)
                    ->addIndexColumn()
                    ->setRowId(function ($user) {
                        return 'row'.$user->id;
                    })
                    ->addColumn('Image', function ($user) {
                        $img = $user->image !=null ? $user->image->url : 'http://anirachemicals.com/admin/assets/images/accounticon.png';
                        return ' <td class="py-1">
                                    <img id="imgV" onclick="imageView()" src="'.$img.'" alt="image" data-mdb-img="'.$img.'"
                                    alt="visiting image"
                                    class="w-100"/>
                                </td>';
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
                        $status='';
                        if($user->is_active ==1){
                            $status ='Active';
                        }else{
                            $status= 'Deactive';
                        }
                        return $status;
                    })

                    ->addColumn('action', function($user){
                        if($user->is_active ==1){
                            $status = 'Deactivate';
                        }else{
                            $status = 'Activate';
                        }
                        return '<div class="dropdown">
                                <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                <a class="dropdown-item" href="'.url('admin/user-update/'.$user->id).'">Edit</a>
                                <a class="dropdown-item" href="'.url('admin/user/change-status/'.$user->id).'">'.$status.'</a>

                                </div>
                            </div>';

                    })
                    ->rawColumns(['action','Image'])
                    ->make(true);
        }

        return view('admin.pages.users.list');
    }

    public function edit($id){
        if($id!=null){
            $user = User::find($id);
            $data['state'] = State::all();
            $data['city'] = City::all();
            $data['user'] = $user;
            return view('admin.pages.users.edit',['data'=>$data]);
        }
    }

    public function update(Request $request){

        if($request->id !=null){
            $data = $request->except(['avatar']);
            //Validated
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'mobile' => 'required|min:10',
            ]);

            $user = $this->recordSave(User::class,$data,null,null);

            if($request->avatar !=null){
                $image = $this->fileUpload($request->avatar,$user,'local');
                $image['document_type']='avatar';
                $user->image()->create($image);
            }

            return redirect()->back()->with(['message'=>'success']);
        }
    }

    public function changeStatus($id)
    {
        $user = User::find($id);
        $value = !$user->is_active;
        $user->update([
            'is_active' => (int) $value,
        ]);

        return redirect()->back()->with(['message'=>'success']);
    }

    public function settingView()
    {
        return view('admin.pages.users.setting');
    }

    public function changePassword(Request $request)
    {
        $user = User::find(auth('web')->user()->id);
        //Validated
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with(['message'=>'Password Updated']);
    }
}
