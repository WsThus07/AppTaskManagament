<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
{
    //
    public function index()
    {
        //
       // Retrieve the session data
            $sessionData = Session::get('user');

            // Create a new User instance and assign the session data
            $user = new User();
            $user->id = $sessionData['id'];
            $user->FullName = $sessionData['FullName'];
            $user->role = $sessionData['role'];
            $user->job = $sessionData['job'];
            $user->email = $sessionData['email'];
            $user->password = $sessionData['password'];
            //dd($user);
            if($user->role =='User') return view('user.profile',compact('user'));
            if($user->role =='Admin') return view('admin.profile',compact('user'));
            if($user->role =='Manager') return view('manager.profile',compact('user'));
       // return view('user.profile',compact('user'));
        
    }
    public function create()
    {
        //
       // Retrieve the session data
            $sessionData = Session::get('user');

            // Create a new User instance and assign the session data
            $user = new User();
            $user->id = $sessionData['id'];
            $user->FullName = $sessionData['FullName'];
            $user->role = $sessionData['role'];
            $user->job = $sessionData['job'];
            $user->email = $sessionData['email'];
            $user->password = $sessionData['password'];
            //dd($user);
            if($user->role =='User') return view('user.editProfile',compact('user'));
            if($user->role =='Admin') return view('admin.editProfile',compact('user'));
            if($user->role =='Manager') return view('manager.editProfile',compact('user'));
       // return view('user.profile',compact('user'));
        
    }
    public function store(Request $request)
    {
        //
        $sessionData = Session::get('user');
        $sessionData['FullName']=$request->FullName;
        $sessionData['job']=$request->job;
        $sessionData['email']=$request->email;
        $sessionData['password']=$request->password;
        DB::table('users')
    ->where('id', $sessionData['id']) // Specify the condition for the update (e.g., based on the record ID)
    ->update([
        'FullName' =>$sessionData['FullName'], // Update the column values as needed
        'job' => $sessionData['job'],
        'email' => $sessionData['email'],
        'password' =>$sessionData['password'],
        // Add more columns and values as necessary
    ]);
    //udate session 
    Session::put('user', $sessionData);
    
    return redirect()->route('profile.index')
        ->with('success','profile has been updated secsessfully !');

    }

}
