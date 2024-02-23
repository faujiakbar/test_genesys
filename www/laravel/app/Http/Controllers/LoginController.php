<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\{Request, Response};
use App\Models\{
    User
};
use Hash;

class LoginController extends Controller {

    public function login(Request $r){
        $return = [
            "status" => true,
            "message" => "Berhasil",
            "data" => [],
            "code" => 200
        ];

        // find user in database
        $sql = User::where("username", $r->username)->first();

        if(!$sql){
            $return['status'] = false;
            $return['message'] = "Tidak Ditemukan";
        }

        if($return['status']) {
            if(!Hash::check($r->password, $sql->password)){
                $return['status'] = false;
                $return['message'] = "Kata sandi tidak sesuai";
            }
        }

        return Response()->json($return, $return['code']);
    }
}
