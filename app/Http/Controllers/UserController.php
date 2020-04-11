<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\User;
use App\Task;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get user and mobile data from User model
        $user = User::find(1);
        // // var_dump($user->name);
        $user->tasks;

        // get user data from Mobile model
        // $user = Task::find(1)->user;        

        // get mobile number from User model
        // $task = User::find(1)->mobile;

        return $user;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        $user->name = "Test232 Name";
        $user->email = "test@mnp.com";
        $user->password = "12345678";
        $user->save();

        $task = new Task;
        $task->mobile = '123456789';
        $user->tasks()->save($task);
        return $user;
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
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $user = User::find(1);

        $user->name = 'New Test';
        $user->tasks->mobile = '12334';
        $user->push();
        // $tmp = User::all();
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = User::find(1);
        $user->delete();

        return $user;
    }
}
