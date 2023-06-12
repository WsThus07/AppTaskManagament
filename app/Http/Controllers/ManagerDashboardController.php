<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ManagerDashboardController extends Controller
{
    public function analyticsDashboardManager()
    {
        $userCount = User::where('role', 'user')->count();
        $sessionData = Session::get('user');
        $projectCount = Project::where('id_manager', $sessionData['id'])->count();
        $taskCount = Task::count();

        return view('manager.dashboard', compact('userCount', 'projectCount', 'taskCount'));
    }
}
