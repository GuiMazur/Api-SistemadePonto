<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        try{ 
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
            $response=array("result"=>true, "message"=>"Conta Criada com sucesso");
        } catch(Exception $e){$response=array("result"=>false, "message"=>$e);}

        return $response;
    }

    public function login(Request $request){
        try {
            $userData = User::where('email', $request->toArray()["email"])->first()->toArray();
            if (Hash::check($request->toArray()["password"], $userData["password"])) {
                return $userData;
            } else { return false;}
        } catch (Exception $e){return false;}
    }

    public function getLogs(User $user){
        return $user->timeLogs->toArray();
    }
}
