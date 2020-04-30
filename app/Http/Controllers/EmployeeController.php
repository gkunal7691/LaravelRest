<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;
use App\Employee;
use App\Cabs;
use App\Http\Requests;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp = Employee::all();
        return EmployeeResource::collection($emp);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emp = new Employee;
        $emp->salary = $request->input('salary');
        $emp->emp_name = $request->input('emp_name');
        $emp->job_description = $request->input('job');
        $emp->save();
        return new EmployeeResource($emp);
    }

    public function create(Request $request)
    {
        $emp = new Employee;
        $emp->salary = $request->input('salary');
        $emp->emp_name = $request->input('emp_name');
        $emp->job_description = $request->input('job');
        $emp->save();
        return new EmployeeResource($emp);
    }

    public function manyCreate()
    {
        $emp = new Employee;
        $emp->name = 'God of War qwe';
        $emp->save();
        $cab = new Cabs;
        $cab->name = 'driver';
        $cab->type = 'car';
        $emp->cabs()->save($cab);

        return $emp;
    }

    public function manyShow($id)
    {
        $emp = Employee::find($id);
        $emp->cabs;
        if ($emp) {
            return new EmployeeResource($emp);
        } else {
            return "null";
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Employee::find($id); //id comes from route
        if ($article) {
            return new EmployeeResource($article);
        }
        return "Employee Not found" . $id; // temporary error
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
        $emp = Employee::find($id);
        $emp->salary = $request->input('salary');
        $emp->emp_name = $request->input('emp_name');
        $emp->job_description = $request->input('job');
        $emp->save();
        return new EmployeeResource($emp);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp = Employee::findOrfail($id);
        if ($emp->delete()) {
            return  new EmployeeResource($emp);
        }
        return "Error while deleting";
    }
}
