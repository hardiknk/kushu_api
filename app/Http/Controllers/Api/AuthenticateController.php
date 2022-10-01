<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LoginResource;
use App\Models\User;
use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    //
    public function login(Request $request)
    {
        $is_login = User::where("email",$request->email)->where("password",$request->password)->first();
        if ($is_login) {
            return (new LoginResource($is_login))->additional([
                "message" => "login successfully",
            ]);
        }
        else {
            return response()->json(["data"=>null, "message"=>"no user found or invalid credential"],200);
        }
    }
}
