<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Schedule;

class SheduleController extends Controller
{
    public function index() 
    {
        try {
            $shedules = Schedule::all()->each(function($shedule, $key) {
                $shedule->speaker = $shedule->speaker;
            });
            return response()->json([
                'state' => true,
                'status' => 200,
                'message' => '',
                'total_count' => 200,
                'shedules' => $shedules

            ], 200);   
        } catch (Exception $e) {
            return response()->json([
                'state'=> false,
                'status'=>402,
                'message'=> 'Internal server error',
                'schedule'=>null
            ]);
        }

    }

    public function clap($id)
    {
        try {
            $schedule = Schedule::find($id);
            $schedule->clap_count += 1;
            $schedule->update();  

            return response()->json([
                'state' => true,
                'status' => 200,
                'message' => '',
                'clap_count' => $schedule->clap_count
            ]);
        } catch (Exception $e) {
            return response()->json([
                'state'=> false,
                'status'=>402,
                'message'=> 'Internal server error',
                'schedule'=>null
            ]);
        }
    }
}
