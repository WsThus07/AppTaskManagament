<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }


    public function analyticsDashboard()
    {
        $userCount = User::where('role', 'user')->count();
        $projectCount = Project::count();
        $managerCount = User::where('role', 'manager')->count();

        return view('admin.dashboard', compact('userCount', 'projectCount', 'managerCount'));
    }
    public function analyticsDashboardEmploye()
    {


        $sessionData = Session::get('user');
        $userId = $sessionData['id'];
        $taskCount = Task::where('user_id', $sessionData['id'])->count();
        /* $projects = Project::whereHas('tasks', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();

        $projectCount = $projects->count();*/
        $projectCount = 2;
        return view('user.dashboard', compact('projectCount', 'taskCount'));
    }
    public function analyticsDashboardManager()
    {
        $userCount = User::where('role', 'user')->count();
        $sessionData = Session::get('user');
        $projectCount = Project::where('id_manager', $sessionData['id'])->count();
        $taskCount = Task::count();

        return view('manager.dashboard', compact('userCount', 'projectCount', 'taskCount'));
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

                return $this->analyticsDashboard();

        } elseif ($user->role === 'Manager') {

                return $this->analyticsDashboardManager();


        } else {

                return $this->analyticsDashboardEmploye();
        }
    } else {
        // Authentication failed
        return redirect()->route('login')->withErrors(['message' => 'Invalid credentials']);

    }
}

    public function logout()
    {
        Auth::logout();

        // Clear the user's session or perform any additional actions

        return redirect()->route('login');
    }
// ...





}
