<?php

namespace App\Services;

use App\Models\PackingSize;
use App\Models\Product;
use App\Models\StatusLog;
use App\Models\Team;
use App\Models\User;
use App\Models\Visit;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class VisitService
{
    protected $defaultPage = 5;
    protected $orderBy = 'DESC';

    public function getAllVisits()
    {
        return Visit::with('state','city','creator','image','statuslogs','statuslogs.creator')->orderBy('id',$this->orderBy)->paginate($this->defaultPage);
    }

    public function getVisitsByFilter($request)
    {
        return Visit::with('state','city','creator','image','statuslogs','statuslogs.creator')
        ->where( function($q)use($request){
            if($request->seach_term !='' && $request->seach_term ){
                $q->where('name_of_establishment', 'like', '%'.$request->seach_term.'%')
                ->orWhere('key_person', 'like', '%'.$request->seach_term.'%')
                ->orWhere('mobile', 'like', '%'.$request->seach_term.'%')
                ->orWhere('email', 'like', '%'.$request->seach_term.'%');
            }else if($request->filter_item !='' && $request->filter_item && $request->type !=null ){
                $filter = $request->filter_item;
                if(getType( $filter) != 'array'){
                    if($request->type == 'city'){
                        $q->where('city_id', $filter);
                    }else if($request->type == 'status'){
                        $q->where('status', $filter);
                    }
                }else{
                    $q->whereDate('created_at','>=',$filter['startDate'])->whereDate('created_at','<=',$filter['endDate']);
                }

            }

        })
        ->orderBy('id',$this->orderBy)
        ->paginate($this->defaultPage);
    }

    public function createStatusLog($visit,$data,$action=null)
    {
        try{
            $statusdata = [
                'action' => $action ? $action : 'update',
                'logs' => json_encode($visit->toArray()),
                'changes' => $this->getStatusById($data['status']),
                'created_by' => auth()->user()->id,
            ];
            $visit->statuslog()->create($statusdata);
        }catch(Exception $e){
            return [];
        }

    }

    public function getStatusById($id){
        if($id == 1){
            return 'Open - Not Contacted';
        }elseif($id ==2){
            return 'Working - Contacted';
        }elseif($id ==3){
            return 'Closed - Converted';
        }elseif($id ==4){
            return 'Closed - Not Converted';
        }
    }

    // Get exported Data

    public function visitExportData($request)
    {
        $visits =  Visit::with('state','city','creator','image')
        ->where( function($q)use($request){
            if($request->seach_term !='' && $request->seach_term ){
                $q->where('name_of_establishment', 'like', '%'.$request->seach_term.'%')
                ->orWhere('key_person', 'like', '%'.$request->seach_term.'%')
                ->orWhere('mobile', 'like', '%'.$request->seach_term.'%')
                ->orWhere('email', 'like', '%'.$request->seach_term.'%');
            }else if($request->filter_item !='' && $request->filter_item && $request->type !=null ){
                $filter = $request->filter_item;
                if(getType( $filter) != 'array'){
                    if($request->type == 'city'){
                        $q->where('city_id', $filter);
                    }else if($request->type == 'status'){
                        $q->where('status', $filter);
                    }else if($request->type == 'craeted_date'){
                        $q->whereDate('craeted_at', $filter);
                    }
                }else{
                    $q->whereDate('created_at','>=',$filter['startDate'])->whereDate('created_at','<=',$filter['endDate']);
                }

            }

        });

        if(auth()->user()->hasRole('Employee')){
            $visits = $visits->where('created_by',auth()->user()->id);
        }elseif(auth()->user()->hasRole('Supervisor')){
            $teams = Team::where('team_lead_id',auth()->user()->id)->pluck('id');
            $users = User::whereIn('id',$teams)->pluck('id');
            $visits = $visits->whereIn('created_by',$users);
        }elseif(auth()->user()->hasRole('Admin')){
            $visits = $visits;
        }

        return $visits->latest()->get();
    }
}
