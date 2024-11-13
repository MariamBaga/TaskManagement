<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Notifications\ProjectNotification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        $projects = Project::all();
        $hight_projects = Project::where('priority', 'élevé')->get();
        $important_projects = Project::where('priority', 'Moyenne')->get();
        $low_projects = Project::whereIn('priority', ['faible', 'bas'])->get();

        // Récupérer les notifications de l'utilisateur connecté
        $notifications = Auth::user()->notifications()->latest()->get();

        return view('pages.projects.index', compact('users', 'projects', 'hight_projects', 'important_projects', 'low_projects', 'notifications'));
    }

    public function create() {}

    public function store(Request $request)
    {
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

        // Attacher les utilisateurs assignés au projet
        $project->users()->attach($request->users);

        // Envoyer la notification aux utilisateurs assignés, sauf l'utilisateur actuel
        foreach ($project->users as $user) {
            if ($user->id !== Auth::id()) {
                $notificationId = Str::uuid();
                // Passer le bon nombre d'arguments au constructeur de la notification
                $user->notify(new ProjectNotification($project, 'created', $user->id, $notificationId));
            }
        }

        return back()->with('success', 'Projet créé avec succès');
    }

    public function edit() {}

    public function update(Request $request, Project $project)
    {
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

        // Mettre à jour les utilisateurs assignés au projet
        $project->users()->sync($request->users);

        // Envoyer une notification de mise à jour aux utilisateurs assignés, sauf l'utilisateur actuel
        foreach ($project->users as $user) {
            if ($user->id !== Auth::id()) {
                $notificationId = Str::uuid();
                // Passer le bon nombre d'arguments au constructeur de la notification
                $user->notify(new ProjectNotification($project, 'updated', $user->id, $notificationId));
            }
        }

        return back()->with('success', 'Projet mis à jour avec succès');
    }

    public function destroy(Project $project)
    {
        // Récupérer les utilisateurs assignés avant la suppression
        $assignedUsers = $project->users;

        // Supprimer le projet
        $project->delete();

        // Envoyer des notifications de suppression aux utilisateurs affectés, sauf l'utilisateur actuel
        foreach ($assignedUsers as $user) {
            if ($user->id !== Auth::id()) {
                $notificationId = Str::uuid();
                // Passer le bon nombre d'arguments au constructeur de la notification
                $user->notify(new ProjectNotification($project, 'deleted', $user->id, $notificationId));
            }
        }

        return back()->with('success', 'Projet supprimé avec succès');
    }
}
