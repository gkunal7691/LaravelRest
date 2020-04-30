<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Cabs;

class CabsController extends Controller
{
    public function create(Request $request)
    {
        $emp = new Employee;
        $emp->name = 'God of War qwe';
        $cab = new Cabs;
        $cab->name = 'Gautam_New';
        $emp->cabs()->save($cab);

        return $emp;
    }
}
