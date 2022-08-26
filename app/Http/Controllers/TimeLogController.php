<?php

namespace App\Http\Controllers;

use App\Models\TimeLog;
use Illuminate\Http\Request;

class TimeLogController extends Controller
{
    public function timeRecorder(Request $request){
        $timeData = $request->toArray();
        TimeLog::create($timeData);
    }


}
