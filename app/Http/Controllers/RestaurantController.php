<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LookUp;
use App\Restaurant;
use App\Schedule;

class RestaurantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:sanctum');
    }
    
    /**
     * one time run for inserting the restaurants schedules in the schedule table
     */
    public function transform() {
        $daysOfWeek = array(0=>'Mon',1=>'Tue',2=>'Wed',3=>'Thu',4=>'Fri',5=>'Sat',6=>'Sun');
        
        $restaurants = Restaurant::all();

        foreach($restaurants as $restaurant) {
            $restaurant_id = $restaurant->id;
            for($i = 1;$i<=7;$i++) {
                
                if(!empty($restaurant->{'d'.$i})){
                    $time = explode("-",$restaurant->{'t'.$i});
                    $days = explode(",",$restaurant->{'d'.$i});
                    
                    foreach($days as $day) {                     
                        // if $day has - then it means it is a range (from this day - to this day)
                        if(strpos($day,"-")> 0) {

                            $d = explode("-",$day); //$d[0] start $d[1] end
                            
                            $d0Index = array_search(trim($d[0]),$daysOfWeek); //index of $d[0]
                            $d1Index = array_search(trim($d[1]),$daysOfWeek); //index of $d[1]

                            if($d0Index > $d1Index){
                                for($a = $d0Index;$a<=array_key_last($daysOfWeek);$a++){
                                    $attributes = array();
                                    $attributes['restaurant_id'] = $restaurant_id;
                                    $attributes['operation'] = $daysOfWeek[$a];
                                    $attributes['opening'] = trim($time[0]);
                                    $attributes['closing'] = trim($time[1]);
                              
                                    Schedule::create($attributes);
                                }

                                for($b = 0; $b <=$d1Index; $b++) {
                                    $attributes = array();
                                    $attributes['restaurant_id'] = $restaurant_id;
                                    $attributes['operation'] = $daysOfWeek[$b];
                                    $attributes['opening'] = trim($time[0]);
                                    $attributes['closing'] = trim($time[1]);
                                  
                                    Schedule::create($attributes);
                                }

                            } else {
                                for($c = $d0Index; $c<=$d1Index; $c++){                                    
                                    $attributes = array();
                                    $attributes['restaurant_id'] = $restaurant_id;
                                    $attributes['operation'] = $daysOfWeek[$c];
                                    $attributes['opening'] = trim($time[0]);
                                    $attributes['closing'] = trim($time[1]);
                                 
                                    Schedule::create($attributes);                                 
                                }
                            }
                           
                        } else {
                            $attributes['restaurant_id'] = $restaurant_id;
                            $attributes['operation'] = trim($day);
                            $attributes['opening'] = trim($time[0]);
                            $attributes['closing'] = trim($time[1]);

                            Schedule::create($attributes);
                        }
                    }
                } else {
                    echo 'empty<br/>';
                }
            }
        }

    }
}
