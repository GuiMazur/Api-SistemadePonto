<?php

namespace App\Http\Controllers;

use App\Models\TimeLog;
use App\Models\User;
use Illuminate\Http\Request;

class TimeLogController extends Controller
{
    public function timeRecorder(Request $request){
        $timeData = $request->toArray();
        $registeredPassword = User::find($timeData["user_id"])->toArray()["password"];
        if ($timeData["password"] == $registeredPassword){
        TimeLog::create($timeData);
        return "Registro criado com sucesso.";
        }
    }


}
