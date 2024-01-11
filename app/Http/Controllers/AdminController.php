<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AdminController extends Controller
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
    


}
