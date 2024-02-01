<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        view()->composer('*', function ($view) {
            if(Auth::check()){
                $notifications=[];
                if(auth()->user()->hasRole('Employee')){
                    $notifications[] = auth()->user()->unreadNotifications;

                }elseif(auth()->user()->hasRole('Supervisor')){
                    $teams = Team::where('team_lead_id',auth()->user()->id)->pluck('id');
                    $users = User::whereIn('id',$teams)->pluck('id');
                    foreach($users as $user){
                        if(count($user->notifications) > 0){
                            $notifications = array_merge_recursive(array ($user->unreadNotifications),$notifications);
                        }
                    }

                }elseif(auth()->user()->hasRole('Admin')){
                    $users = User::all();
                    foreach($users as $user){
                        if(count($user->notifications) > 0){
                            $notifications = array_merge_recursive(array ($user->unreadNotifications),$notifications);
                        }
                    }

                }

                view()->share('notifications', $notifications[0]);
            }



        });





        Schema::defaultStringLength(191);
        date_default_timezone_set('Asia/Calcutta');

        Paginator::useBootstrap();
    }
}
