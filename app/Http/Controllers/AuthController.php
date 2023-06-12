<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Project;
class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }



// ...

public function login(Request $request)
{
    // Validate the form data
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    $user = DB::table('users')->select('users.*')
    ->where('email', $request->email)
    ->where('password', $request->password)
    ->first();

    /*$credentials = $request->only('email', 'password');

    $user = User::where('email', $credentials['email'])->first();*/

    if (!empty($user)) {
        // Password matches, user is authenticated
        //Auth::login($user);
       // $request->session()->put('user', $user);
       Session::put(['user' => [
        'id'=>$user->id,
        'FullName' => $user->FullName,
        'role'=>$user->role,
        'job'=>$user->job,
        'email' => $user->email,
        'password'=>$user->password,

]]);
    //$value = Session::get('user');
    //dd($value);

        // Redirect to the appropriate dashboard based on the user's role
        if ($user->role === 'Admin') {
            // Store user data in session

            return redirect()->route('admin.dashboard');
           
        } elseif ($user->role === 'Manager') {

            return redirect()->route('manager.dashboard');


        } else {

            return redirect()->route('user.dashboard');
        }
    } else {
        // Authentication failed
        return redirect()->route('login')->withErrors(['message' => 'Invalid credentials']);

    }
}


// ...





}
