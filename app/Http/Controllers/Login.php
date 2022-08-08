<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;


class Login extends Controller
{
    public function login(Request $req)
    {

        $req->validate([
            'email' => ['unique:users']
        ]);

        $user = new User;
        $user->name = $req->name;
        $user->password = $req->password;
        $user->email = $req->email;

        $user->save();


        $result[] = [
            'NAAAME' => $user->name,
            'EMAIAAAIL' => $user->email,
            'Password' => [
                'pass' => $user->password,
                'token' => $user->remember_token
            ]
        ];


        return $result;

        return response($user);
    }
}
