<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class App extends Controller
{
    public function index()
    {
        return view('app.index');
    }

    public function login(Request $request)
    {
        $user = DB::table('users')->where('email', $request->input('email'))->get()->first();

        if($user && Hash::check( $request->input('password'), $user->password ))
        {
            session(
                ['authUser' => $user->id]
            );

            return Redirect::route('app.index');
        }
        else
        {
            return Redirect::route('auth.login');
        }
    }
}
