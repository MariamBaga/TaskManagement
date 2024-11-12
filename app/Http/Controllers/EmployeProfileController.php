<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeProfileController extends Controller
{
    //

    public function index()
    {

        return view('Admin.Employer.Profile.index');
    }
}
