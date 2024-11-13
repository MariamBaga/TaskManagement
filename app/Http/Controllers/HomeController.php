<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard(){
        $tasks = Task::all();
        $projects = Project::all();

        return view('dashboard', compact('tasks', 'projects'));
    }
}
