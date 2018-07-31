<?php
namespace VannessPlus\Http\Controllers\Admin;

use Illuminate\Http\Request;
use VannessPlus\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public function index() 
    {
        $events = []; 

        foreach (\VannessPlus\Timeslot::all() as $timeslot) { 
           $crudFieldValue = $timeslot->getOriginal('start_time'); 

           if (! $crudFieldValue) {
               continue;
           }

           $eventLabel     = $timeslot->start_time; 
           $prefix         = ''; 
           $suffix         = ''; 
           $dataFieldValue = trim($prefix . " " . $eventLabel . " " . $suffix); 
           $events[]       = [ 
                'title' => $dataFieldValue, 
                'start' => $crudFieldValue, 
                'url'   => route('admin.timeslots.edit', $timeslot->id)
           ]; 
        } 


       return view('admin.calendar' , compact('events')); 
    }

}
