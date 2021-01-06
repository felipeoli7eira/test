<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Redirect;

class User extends Controller
{
    public function list()
    {
        $users = UserModel::all();
        return view('app.user.list', ['users' => $users]);
    }

    public function create()
    {
        return view('app.user.create');
    }

    public function store(Request $request)
    {
        $user = new UserModel();
        $user->first_name = $request->input('first_name');
        $user->last_name  = $request->input('last_name');
        $user->email      = $request->input('email');
        $user->password   = Hash::make( $request->input('password') );
        $user->level      = $request->input('level');

        $user->save();

        return Redirect::route('app.user.list');
    }

    public function delete(Request $request)
    {
        $user = UserModel::find($request->id);

        $user->delete();
        return Redirect::route('app.user.list');
    }

    public function update(Request $request)
    {
        $user = UserModel::find($request->input('user_id'));

        $user->first_name = $request->input('first_name');
        $user->last_name  = $request->input('last_name');
        $user->email      = $request->input('email');
        $user->password   = Hash::make( $request->input('password') );
        $user->level      = $request->input('level');

        $user->save();

        return Redirect::route('app.user.list');
    }
}
