<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loginmodal;

class Login extends Controller
{
    public function login(Request $req){
        $validation = $req->validate([
            'username' => ['required', 'string', 'min:3', 'max:20', 'regex:/^[a-zA-Z0-9_\s ]+$/'],
            'password' => 'required | min:3 | max:20'

        ]);
    }
}
