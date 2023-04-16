<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function registerview()
    {
        $data['state'] = State::all();
        return view('admin.auth.register',['data'=>$data]);
    }

    public function loginview()
    {
        return view('admin.auth.login');
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
            $validateUser = Validator::make($request->all(),
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'mobile' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ]);

            // if($validateUser->fails()){
            //     return response()->json($validateUser->errors());
            // }

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
                'password' => Hash::make($request->password)
            ]);

            $token = Auth::login($user);
            if($token){
                return redirect($this->redirectTo);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
    {
        try {

            $validateUser = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $credentials =$request->only('email', 'password');



            if(!Auth::attempt($credentials)){
                // return redirect()->intended('dashboard');
                // return redirect()->back()->with(['message' => 'Email & Password does not match with our record.']);
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            if($user){
                return redirect($this->redirectTo);
            }

            // return redirect($this->redirectTo);
            // return response()->json([
            //     'status' => true,
            //     'message' => 'User Logged In Successfully',
            //     'token' => $user->createToken("API TOKEN")->plainTextToken
            // ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'Successfully logged out',
        // ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
