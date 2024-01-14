<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('content.Admin.profile');
    }
    public function changePassword(Request $request) {
        $newPassword = $request->input('newPassword');
        $user = auth()->user();
        $user->update([
            'password' => Hash::make($newPassword),
        ]);
        $user->save();

        return response(['success' => true]);
    }
    public function register()
    {
        return view('content.dashboard.dashboard');
    }

    public function createAgent(){
        return view('content.users.create-agent');
    }

    public function agentsList(){
        return view('content.users.user-list');
    }

    public function allViews(){
        return view('content.all-views.all-views');
    }
}
