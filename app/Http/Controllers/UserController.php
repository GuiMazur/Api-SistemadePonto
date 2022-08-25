<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        $userData = $request->toArray();
        switch ($userData["admin"]) {
            case true:
                $userData["admin"] = '1';
                break;
            case false:
                $userData["admin"] = '0';
                break;
        }
        $userData['password'] = Hash::make($userData['password']);
        User::create($userData);
    }

    public function login(Request $request){
        $userData = User::where('email', $request->toArray()["email"])->first()->toArray();
        if (Hash::check($request->toArray()["password"], $userData["password"])) {
            return $userData;
        } else { return 'erro';}
    }
}
