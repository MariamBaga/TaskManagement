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
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Vérifier si l'utilisateur est un administrateur
        if ($user->role == 'admin') {
            // Si c'est un administrateur, récupérer tous les projets
            $projects = Project::all();
        } else {
            // Sinon, récupérer uniquement les projets assignés à l'utilisateur
            $projects = $user->projects;  // Utiliser la relation 'projects' définie dans le modèle User
        }

        // Séparer les projets par priorité
        $hight_projects = $projects->where('priority', 'élevé');
        $important_projects = $projects->where('priority', 'Moyenne');
        $low_projects = $projects->whereIn('priority', ['faible', 'bas']);

        // Récupérer les utilisateurs pour la vue
        $users = User::latest()->get();

        // Récupérer les notifications de l'utilisateur connecté
        $notifications = $user->notifications()->latest()->get();

        // Retourner la vue avec les données
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

         // Envoyer la notification aux utilisateurs assignés
    foreach ($project->users as $user) {
        $notificationId = Str::uuid();
        // Envoyer la notification à tous les utilisateurs, y compris l'utilisateur actuel
        $user->notify(new ProjectNotification($project, 'crée', Auth::user(), $notificationId));
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

        // Envoyer une notification de mise à jour à tous les utilisateurs, y compris l'utilisateur actuel
    foreach ($project->users as $user) {
        $notificationId = Str::uuid();
        $user->notify(new ProjectNotification($project, 'mise à jour',  Auth::user(), $notificationId));
    }

        return back()->with('success', 'Projet mis à jour avec succès');
    }

    public function destroy(Project $project)
    {
        // Récupérer les utilisateurs assignés avant la suppression
        $assignedUsers = $project->users;

        // Supprimer le projet
        $project->delete();


    // Envoyer des notifications de suppression à tous les utilisateurs affectés, y compris l'utilisateur actuel
    foreach ($assignedUsers as $user) {
        $notificationId = Str::uuid();
        $user->notify(new ProjectNotification($project, 'supprimé',  Auth::user(), $notificationId));
    }

        return back()->with('success', 'Projet supprimé avec succès');
    }
}
