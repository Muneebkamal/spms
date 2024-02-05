<?php

namespace App\Services;

use App\Models\ActivityLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ActivityLogService
{
    //this function will save  only agents activites 
    public static function saveLog(){
       //save log 
    //    dd(Auth::user());
    //    dd(auth()->user());
       if(auth()->user()){
            if(auth()->user()->role == 'agent'){
                $fullUrl = request()->fullUrl();
                $curren_user = auth()->user();
                $todayLogs = ActivityLog::where('user_id',$curren_user->id)->where('url',$fullUrl)->whereDate('created_at', Carbon::today())->get();
                if(sizeof($todayLogs) <= 0){
                    $activityLog = new ActivityLog;
                    $activityLog->user_id = $curren_user->id;
                    $activityLog->user_name = $curren_user->name;
                    $activityLog->url = $fullUrl;
                    $activityLog->save();
                }
               
            }
          

       }
       
    
    }
}
