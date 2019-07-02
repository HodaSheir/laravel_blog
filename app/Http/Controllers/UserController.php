<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Session;
use Hash;

class UserController extends Controller {

    public function index() {
        return view('admin.index');
    }

    public function edit($id) {
        $users = User::find($id);
        return view('auth.change_password')->with('users', $users);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
           'password' => 'required|min:3|confirmed'
        ]);

        if ($validator->fails()) { //echo '1'; die();
            return redirect('user/' . Auth::user()->id . '/edit')->withInput()->withErrors($validator);
        }
        $users = User::find($id);
        $users->fill([
            'password' => Hash::make($request->password)
        ])->save();

        Session::flash('password_updated', 'Password is updated');

        return redirect('user');
    }

}
