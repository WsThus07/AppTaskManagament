<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //extract data from session


        $projectData=DB::table('projects')
        ->join('users', 'projects.id_manager', '=', 'users.id')
        ->select('projects.*', 'users.FullName')
        ->get();
        return view('admin.projects',compact("projectData"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        $select_manager=DB::table('users')->where('role', 'Manager')->pluck('FullName');
        return view('admin.addProject',['select_manager'=> $select_manager]);

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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date'=>'required',
            //'status' =>'required',
           'priority' =>'required',
           // 'id_manager' =>'required', maybe this is the error hit lformulaire ma3ndish id _man endi manager howa likandkhl
           'manager'=>'required',

        ]);
        $project =new Project();
        $project->name=$request->name;
        $project->description=$request->description;
        $project->start_date=$request->start_date;
        $project->end_date=$request->end_date;
       // $project->status=$request->status;
        $project->priority=$request->priority;
        $project->id_manager=DB::table('users')->where('FullName',$request->manager)->value('id');
        $project->save();
        return redirect()->route('projects.index')
        ->with('success','projet has been created secsessfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //hnaaa n afficher tasks dyal dak projet lizad lmanager
        $project_tasks = DB::table('tasks')
        ->join('users', 'users.id', '=', 'tasks.user_id')
        ->where('tasks.id_project', $id)
            ->select('tasks.*', 'users.FullName')
            ->get();
        return view('admin.viewTasks', ["project_tasks" => $project_tasks]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        $select_manager=DB::table('users')->where('role', 'Manager')->pluck('FullName');
        $manager=DB::table('projects')
        ->join('users', 'projects.id_manager', '=', 'users.id')
        ->select('users.FullName')
        ->get();
        // $manager=DB::table('projects')->where('id_manager',$project->id_manager)->value('FullName');
        return view('admin.editProject',['project'=>$project,'select_manager'=> $select_manager,'manager'=>$manager]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {

        //------------------------
        //dd($project->id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date'=>'required',
            //'status' =>'required',
            'priority' =>'required',
           // 'id_manager' =>'required', maybe this is the error hit lformulaire ma3ndish id _man endi manager howa likandkhl
           'manager'=>'required',

        ]);
        //insert contrat data into contrat table

        $project->name=$request->name;
       /// dd( $project->name);
        $project->description=$request->description;
        $project->start_date=$request->start_date;
        $project->end_date=$request->end_date;
        $project->priority=$request->priority;
        $manager = DB::table('users')->where('FullName', $request->manager)->first();
        if ($manager) {
            $project->id_manager = $manager->id;
        }
        //$project->id_manager=DB::table('users')->where('FullName',$request->manager)->value('id'); // idiii
       $project->save();
        return redirect()->route('projects.index')
                        ->with('success','project has been updated !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projectData = Project::find($id);

        // Check if the project exists
        if (!$projectData) {
            return redirect()->route('projects.index')->with('error', 'Project not found.');
        }

        // Check if the user confirmed the deletion
        if (request('confirm') == 'yes') {
            $projectData->delete();
            return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
        }

        return view('projects.index', compact('projectData'));
    }
}
