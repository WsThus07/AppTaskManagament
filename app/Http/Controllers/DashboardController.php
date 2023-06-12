<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;


class DashboardController extends Controller
{
    public function analyticsDashboard()
{
    $userCount = User::where('role', 'user')->count();
    $projectCount = Project::count();
    $managerCount = User::where('role', 'manager')->count();

    return view('admin.dashboard', compact('userCount', 'projectCount', 'managerCount'));
}
public function analyticsDashboardManager()
    {
        $userCount = User::where('role', 'user')->count();
        $projectCount = Project::count();
        $taskCount = Task::count();

        return view('manager.dashboard', compact('userCount', 'projectCount', 'taskCount'));
    }
    public function analyticsDashboardEmploye()
    {
        $projectCount = Project::count();
        $taskCount = Task::count();
        return view('user.dashboard', compact('projectCount', 'taskCount'));
    }

}
