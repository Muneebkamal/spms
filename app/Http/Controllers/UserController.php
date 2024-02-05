<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
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
        return view('content.all-views.all-views');
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
    public function checkPerson()
    {
       
        if (isset($_SESSION['name2'])) {
            
            $name = $_SESSION['name2'];
            $code = $_GET['code'];
            $sqlUpdate = "UPDATE last_update SET username = '$name', updated_at = CURRENT_TIMESTAMP where code = '$code' ";
            mysqli_query($this->link, $sqlUpdate);

            $sqlFind = "SELECT * from extra_view where username = '$name' AND DAY(created_at) = DAY(CURRENT_DATE()) AND MONTH(created_at) = MONTH(CURRENT_DATE())
        AND YEAR(created_at) = YEAR(CURRENT_DATE()) order by view_id DESC";
            $resFind = mysqli_query($this->link, $sqlFind);
            $rowFind = mysqli_fetch_assoc($resFind);
            $number1 = (isset($rowFind['view_count'])) ? $rowFind['view_count'] : 0;
            $number2 = (isset($rowFind['admin_given'])) ? $rowFind['admin_given'] : 0;

            if ($number1 < (40 + $number2)) {

                $sqlCheck = "SELECT * from extra_view where username = '$name' AND code = '$code' AND DAY(created_at) = DAY(CURRENT_DATE()) AND MONTH(created_at) = MONTH(CURRENT_DATE())
                AND YEAR(created_at) = YEAR(CURRENT_DATE()) order by view_id DESC";
                $resCheck = mysqli_query($this->link, $sqlCheck);
                
                if (mysqli_num_rows($resCheck) > 0) {
                    return;
                }


                $count = (isset($rowFind['view_count'])) ? $rowFind['view_count'] : 0;
                $admin_count = (isset($rowFind['admin_given'])) ? $rowFind['admin_given'] : 0;
                $count++;

                $sqlView = "INSERT INTO extra_view (view_id, username, code, view_count, admin_given, created_at) VALUES (NULL, '$name', '$code', $count, $admin_count, CURRENT_TIMESTAMP)";
                mysqli_query($this->link, $sqlView);
            } else {
                header('location:search-landlord.php');
            }
        }
        # code...
    }

}
