<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;

class ManagerDashboardController extends Controller
{
    public function analyticsDashboardManager()
    {
        $userCount = User::where('role', 'user')->count();
        $projectCount = Project::count();
        $taskCount = Task::count();

        return view('manager.dashboard', compact('userCount', 'projectCount', 'taskCount'));
    }
}
