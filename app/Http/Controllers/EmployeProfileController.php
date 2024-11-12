<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class EmployeProfileController extends Controller
{
    //

    public function index()
    {
         // Récupérer les notifications de l'utilisateur connecté
 $notifications = Auth::user()->notifications()->latest()->get();

        return view('Admin.Employer.Profile.index', compact('notifications'));
    }
}
