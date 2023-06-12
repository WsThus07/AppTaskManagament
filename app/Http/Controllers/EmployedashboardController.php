<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class EmployedashboardController extends Controller
{
    public function analyticsDashboardEmploye()
    {

        $sessionData = Session::get('user');
        $taskCount = Task::where('id_user', $sessionData['id'])->count();
        $projectCount = Project::whereHas('tasks', function ($query) use ($sessionData) {
            $query->where('id_user', $sessionData['id']);
        })->count();
        return view('user.dashboard', compact('projectCount', 'taskCount'));
    }
}
