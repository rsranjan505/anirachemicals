<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('admin.pages.notification.list');
    }

    public function notifyRead($id){
        if(Auth::check()){

            if(auth()->user()->hasRole('Employee')){
                $notifications = auth()->user()->unreadNotifications
                                    ->where('id',$id)->first();

            }elseif(auth()->user()->hasRole('Supervisor')){
                $teams = Team::where('team_lead_id',auth()->user()->id)->pluck('id');
                $users = User::whereIn('id',$teams)->pluck('id');
                foreach($users as $user){
                    if($user->unreadNotifications->where('id',$id)->count() > 0){
                        $notifications = $user->unreadNotifications
                                    ->where('id',$id)->first();
                    }
                }

            }elseif(auth()->user()->hasRole('Admin')){
                $users = User::all();
                foreach($users as $user){
                    if($user->unreadNotifications->where('id',$id)->count() > 0){
                        $notifications = $user->unreadNotifications
                                    ->where('id',$id)->first();
                    }
                }

            }
            if($notifications) {
                $notifications->markAsRead();
            }
        }

        return redirect()->route('notification.index');
    }
}
