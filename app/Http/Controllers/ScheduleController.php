<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    
    /**
     * search a restaurant base on opening hours, days open, and it's name
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $time = isset($request->time) ? date( "h:i a", strtotime( $request->time ) ) : '';
        $days = json_decode($request->days);

        $resto = $request->resto ?? '';
        
        //pagination parameters
        $perPage = $request->per_page ?? 10;
        $sortBy = $request->sort_by ?? 'id';
        $sortDesc = $request->sort_desc =='true' ? 'desc':'asc';
        
        $schedules = Schedule::when($time, function ($q) use($time) {
            return $q->where('opening','>=', $time);
        })->when($days, function ($q) use($days) {
            return $q->whereIn('operation', $days);
        })->whereHas('restaurant', function($q) use($resto){
            return $q->where('name','like','%'.$resto.'%');
        });

        return response()->json($schedules->orderBy($sortBy,$sortDesc)->paginate($perPage));
    }
}
