<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile()
    {
        $user = \auth()->user();
        if(\auth()->user()->role == 'admin') {
            return view('content.Admin.profile', compact('user'));
        }else{
            return view('content.users.profile', compact('user'));
        }
    }

    public function viewAgent($id) {
        $user = User::where('id',$id)->first();
        return view('content.users.profileView', compact('user'));
    }
    public function deleteAgent($id) {
        $user = User::where('id',$id)->first();
        $user->delete();
        return response(['success' => true]);
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

    public function createAgentView(){
        return view('content.users.create-agent');
    }

    public function createAgent(Request $request){
        $oldUser = User::where('email',$request->input('email'))->first();
        if($oldUser) {
            return response()->json(['success' => false, 'error' => 'Email Exists']);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'contact_permission' => ($request->input('contact_permission') ? 1 : 0),
            'photo_permission' => ($request->input('photo_permission') ? 1 : 0),
            'role' => 'agent'
        ]);

        // Return a response or redirect
        return response()->json(['success' => true, 'user' => $user]);
    }


    public function agentsList(){
        $users = User::where('role','agent')->get();
        return view('content.users.user-list', compact('users'));
    }

    public function allViews(){
        $logs =  ActivityLog::select('user_id', DB::raw('COUNT(*) as count'))
        ->groupBy('user_id')
        ->whereDate('created_at', Carbon::today())->get();
        foreach($logs as $log){
            $user_data =  ActivityLog::where('user_id',$log->user_id)->latest('created_at')->first();
            $log->user_data = $user_data;
        }
        
        return view('content.all-views.all-views',get_defined_vars());
    }
    public function getViews(Request $request){
        $data =  ActivityLog::where('user_id', $request->user_id)
        ->whereDate('created_at', Carbon::today())->latest('created_at')->get();
        return response()->json($data);
    }

    public function togglePhotoPermission(Request $request)
    {
        $userId = $request->input('id');
        $check = $request->input('check');

        $user = User::where('id', $userId)->first();

        $user->photo_permission = $check;
        $user->save();

        return response()->json(['success' => true]);
    }

    public function toggleContactPermission(Request $request)
    {
        $userId = $request->input('id');
        $check = $request->input('check');

        $user = User::where('id', $userId)->first();

        $user->contact_permission = $check;
        $user->save();

        return response()->json(['success' => true]);
    }

    public function uploadUserImage(Request $request)
    {
        // Validate the request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get the authenticated user
        $user = Auth::user();
        if ($user->image) {
            Storage::delete('public/' . $user->image);
        }

        $image = $request->file('image');
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move('storage/user_images/', $filename);
        $user->image = $filename;
        $user->save();

        return response()->json(['success' => true, 'path' => asset('storage/user_images/' . $filename)]);
    }
}
