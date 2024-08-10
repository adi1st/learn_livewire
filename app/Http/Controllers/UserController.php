<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('users.show', [
            'user' => $user,
        ]);
    }
}
