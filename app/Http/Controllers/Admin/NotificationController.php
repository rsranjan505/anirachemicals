<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification as ModelsNotification;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allnotifications = $this->allNotifications();
        return view('admin.pages.notification.list',compact('allnotifications'));
    }

    public function notifyRead($id){
        if(Auth::check()){
            $notifications = ModelsNotification::find($id);
            if($notifications) {

                $notifications->update(['read_at' => Carbon::now()]);
            }
        }

        return redirect()->route('notification.index');
    }

    public function allNotifications(){
        if(Auth::check()){
            $notifications = [];
            if(auth()->user()->hasRole('Employee')){
                $notifications[] = auth()->user()->notifications
                                ;

            }elseif(auth()->user()->hasRole('Supervisor')){
                $teams = Team::where('team_lead_id',auth()->user()->id)->pluck('id');
                $users = User::whereIn('id',$teams)->pluck('id');
                foreach($users as $user){
                    if($user->notifications->count() > 0){
                        $notifications[] = $user->notifications        ;
                    }
                }

            }elseif(auth()->user()->hasRole('Admin')){
                $users = User::all();
                foreach($users as $user){
                    if($user->notifications->count() > 0){
                        $notifications[] = $user->notifications;
                    }
                }
            }
            return $notifications;
        }
        return [];
    }
}
