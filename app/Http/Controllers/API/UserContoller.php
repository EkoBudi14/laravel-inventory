<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserContoller extends Controller
{
    public function login(Request $request) {
        try {
            // validasi 
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);
            

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
