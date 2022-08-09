<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
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

        return new UserResource($user);
    }
}
