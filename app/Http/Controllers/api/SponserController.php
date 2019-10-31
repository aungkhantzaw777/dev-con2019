<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sponser;

class SponserController extends Controller
{
    public function index()
    {
        return response()->json([
            'state' => true,
            'status' => 200,
            'message' => '',
            'total_count' => 0,
            'sponser' => Sponser::all()
        ]);
    }
}
