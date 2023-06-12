<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usersData = User::all();
        return view('admin.users',compact('usersData'));
    }
    public function index_man(){
        //this func to show users in the manager tables 
        //$usersData = User::all();
        $usersData=DB::table('users')
        ->where('role','User')
        ->select('users.*')
        ->get();
        return view('manager.users',compact('usersData'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.addUser');
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
            'FullName' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'job'=>'required',
            'password' =>'required',
           
        ]);
        
        User::create($request->all());
     
        return redirect()->route('users.index')
                        ->with('success','user created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('admin.editUser',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User  $user)
    {
        //
        $request->validate([
            'FullName' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'job'=>'required',
            'password' =>'required',
           
        ]);
        $user->update($request->all());
        return redirect()->route('users.index')
                        ->with('success','user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $user = User::find($id);

        // Check if the project exists
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        }

        // Check if the user confirmed the deletion
        if (request('confirm') == 'yes') {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'user deleted successfully.');
        }

        return view('users.index', compact('user'));
    }
}
