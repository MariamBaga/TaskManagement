<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        $projects = Project::all();
        return view('pages.projects.index', compact('users', 'projects'));
    }

    public function create() {}

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nom' => 'required|string',
            'description' => 'nullable|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|after:date_debut',
            'image' => 'required|file|image',
            'budjet' => 'required|numeric',
            'users' => 'required|array',
            'priority' => 'required|string',
            'category' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store("Projects");
            $project = new Project($request->all());
            $project->image = $image;
            $project->save();
            if ($project)
                return back()->with('success', 'Projet Créé avec succès');
            else
                return back()->with('error', 'Erreur de saisie');
        }
    }

    public function edit() {}

    public function update() {}

    public function destroy() {}
}
