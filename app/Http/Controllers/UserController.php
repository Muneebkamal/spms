<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        $users = User::where('role','agent')->get();
        return view('content.users.user-list', compact('users'));
    }

    public function allViews(){
        return view('content.all-views.all-views');
    }

    public function togglePhotoPermission(Request $request)
    {
        $userId = $request->input('id');
        $check = $request->input('check');

        $user = User::where('id', $userId)->first();

        $user->photo_permission = $check;
        $user->save();

        return response('success');
    }

    public function toggleContactPermission(Request $request)
    {
        $userId = $request->input('id');
        $check = $request->input('check');

        $user = User::where('id', $userId)->first();

        $user->contact_permission = $check;
        $user->save();

        return response('success');
    }

}
