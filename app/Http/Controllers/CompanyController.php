<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Company;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //

    public function index()
    {
        // get user and mobile data from User model
        // $user = Company::find();
        // // var_dump($user->name);
        // var_dump($user->customer->name);

        // get user data from Mobile model
        // $user = Task::find(1)->user;        

        // get mobile number from User model
        // $task = Company::find(1)->mobile;

        // return $user;
    }

    public function create()
    {
        $company = new Company;
        $company->name = 'Softobotics_123';
        $company->save();

        // $customer = new Customer;
        // $customer->name = 'Gautam_New';

        $cust = new Customer;
        $cust->name = 'Gautam New';
        // $company->customers()->save($customer);
        $company->customers()->save($cust);
        if ($company->save()) {
            return $company;
        } else {
            return "Not added";
        }
    }

    public function show($id)
    {
        $compnay = Company::find($id); //id comes from route
        // var_dump($compnay->name);
        $compnay->customers;
        if ($compnay) {
            return new CompanyResource($compnay);
        } else {
            return "Employee Not found" . $id;
        } // temporary error
    }

    public function update($id)
    {
        $compnay = Company::find($id);
        $cust = Customer::find($id);


        if ($cust && $compnay) {
            $compnay->name = 'Test';
            $compnay->phone = '1231213';
            $compnay->customers()->name = 'NewUpdates';
            $compnay->customers()->update();
        }

        $compnay = Company::find($id);

        $compnay->name = 'Test';
        $compnay->phone = '123123213123';
        $compnay->customers->name = 'NewUpdates';
        $compnay->save();
        if ($compnay) {
            return $compnay;
        } else {
            return "Not added";
        }
    }
}
