<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    public function CreateSession(Request $req){
        
        try {
            $req->session()->put('user', $req->input('email'));
            // echo "<script>console.log('in try')</script>";
            echo "in try";
        } catch (\Throwable $th) {
            // throw $th;
            return ['error ' => 'cant redirect or add session'];
        }
    }
}
