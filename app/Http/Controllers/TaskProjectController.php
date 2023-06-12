<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Session;
class TaskProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retrive the loged user from session
        $user_id =Session::get('user.id');
        $project=DB::table('projects')
        ->select('projects.*', 'u1.FullName as manager')
        ->join('users as u1', 'projects.id_manager', '=', 'u1.id')
        ->join('tasks', 'projects.id', '=', 'tasks.id_project')
        ->join('users as u2', 'u2.id', '=', 'tasks.user_id')
        ->where('u2.id',$user_id)
        ->distinct()
        ->get();


       // dd($project);
        return view('user.projects',compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $user_id =Session::get('user.id');
        //dd($user_conn);
        $user_tasks = DB::table('tasks')
        ->where('tasks.id_project', $id)
    ->where('tasks.user_id',$user_id)
    ->select('tasks.*')

    ->get();


       // dd( $user_tasks);
        return view('user.viewTasks',["user_tasks"=>$user_tasks]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $task = Task::findOrFail($id);
        //dd($task);
       return view ('user.editTask',['task'=>$task ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $task = Task::findOrFail($id);
    $task->status = $request->input('status');
    $task->save();

    return redirect()->route('Ptasks.show', ['Ptask' => $task->id_project])
        ->with('success', 'Task has been updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
