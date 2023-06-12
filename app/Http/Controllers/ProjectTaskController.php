<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Session;


class ProjectTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //for now mazal madrt login bash n afficher ghir dyal lmanager limconnecter

        $sessionData = Session::get('user');

        $project=DB::table('projects')
        ->join('users', 'projects.id_manager', '=', 'users.id')
        ->select('projects.*', 'users.FullName')->where('projects.id_manager',$sessionData['id'])
        ->get();
        return view('manager.projects',compact("project"));
    }
    //--------------------------------------------
    public function view_tasks($id)
    {
        //for now mazal madrt login bash n afficher ghir dyal lmanager limconnecter
        $project_tasks=DB::table('projects')
        ->join('tasks', 'projects.id', '=', 'tasks.id_project')
        ->join('users', 'tasks.user_id', '=', 'users.id')
        ->where('projects.id',$id)
        ->select('tasks.*','users.FullName')
        ->get();


       return view('manager.view_task',["project_tasks"=>$project_tasks,"id"=>$id]);
    }
    public function create_task($id_proj){
       // dd($id_proj);
       $users=DB::table('users')
        ->where('role','User')
        ->get();
        return view ('manager.addTask',['id_proj'=>$id_proj , 'users'=>$users]);

    }
    public function store_task(Request $request){
        //
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date'=>'required',
           'priority' =>'required',
            'user_id' =>'required',// maybe this is the error hit lformulaire ma3ndish id _man endi manager howa likandkhl
           'id_project'=>'required',

        ]);
        $task =new Task();
        $task->name=$request->name;
        $task->description=$request->description;
        $task->start_date=$request->start_date;
        $task->end_date=$request->end_date;
        $task->status="not started";
       $task->priority=$request->priority;
        $task->user_id=$request->user_id;
        $task->id_project=$request->id_project;
        $task->save();
        return redirect()->route('projects_tasks.view_tasks', ['id' => $request->id_project])
    ->with('success', 'Project has been created successfully!');
    }

    //-------------------------------------------
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //edit task ------------------------------
    public function edit($id)
    {
        //
        $users=DB::table('users')
        ->where('role','User')
        ->get();
        $task = Task::findOrFail($id);
        return view ('manager.editTask',['task'=>$task , 'users'=>$users]);

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
        //
        $task = Task::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date'=>'required',
            'user_id' =>'required',// maybe this is the error hit lformulaire ma3ndish id _man endi manager howa likandkhl


        ]);
        $task->name=$request->name;
        $task->description=$request->description;
        $task->start_date=$request->start_date;
        $task->end_date=$request->end_date;
        $task->status=$request->status;
        $task->priority=$request->priority;
        $task->user_id=$request->user_id;
        $task->save();
        return redirect()->route('projects_tasks.view_tasks', ['id' => $task->id_project])
    ->with('success', 'Project has been updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taskData = Task::find($id);

        // Check if the project exists
        if (!$taskData) {
            return redirect()->route('projects_tasks.view_tasks', ['id' => $taskData->id_project])->with('error', 'Task not found.');
        }

        // Check if the user confirmed the deletion
        if (request('confirm') == 'yes') {
            $taskData->delete();
            return redirect()->route('projects_tasks.view_tasks', ['id' => $taskData->id_project])->with('success', 'Task deleted successfully.');
        }

        return view('projects_tasks.view_tasks', ['id' => $taskData->id_project], compact('taskData'));
    }
}
