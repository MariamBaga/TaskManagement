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
            'icon' => 'required|string',
            'budjet' => 'required|numeric',
            'users' => 'required|array',
            'priority' => 'required|string',
            'category' => 'required|string',
        ]);
        $project = Project::create($request->all());

        foreach ($request->users as $user_id) {
            $user = User::find($user_id);
            $user->projects()->attach($project->id);
        }



        return back()->with('success', 'Projet Créé avec succès');
        // if ($project)
        // else
        //     return back()->with('error', 'Erreur de saisie');
    }

    public function edit() {}

    public function update(Request $request, Project $project)
    {
        dd($request->all(), $project);
        $request->validate([
            'nom' => 'required|string',
            'description' => 'nullable|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|after:date_debut',
            'icon' => 'required|string',
            'budjet' => 'required|numeric',
            'users' => 'required|array',
            'priority' => 'required|string',
            'category' => 'required|string',
        ]);

        $project->update($request->all());

        foreach ($request->users as $user_id) {
            $user = User::find($user_id);
            $user->projects()->sync($project->id);
        }

        return back()->with('success', 'Projet Créé avec succès');
    }

    public function destroy() {}
}
