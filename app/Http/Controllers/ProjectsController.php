<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Notification; // Importation du modèle Notification
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
        $low_projects = Project::where('priority', 'faible')
            ->orWhere('priority', 'bas')
            ->get();

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
        foreach ($request->users as $user_id) {
            $user = User::find($user_id);
            $user->projects()->attach($project->id);
        }

        // Envoyer la notification aux utilisateurs assignés
        foreach ($project->users as $user) {
            if ($user->id !== Auth::id()) {
                // Envoyer la notification de création
                $notificationId = Str::uuid();
                $user->notify(new ProjectNotification($project, 'created', $user->name, $notificationId));
            }
        }

        return back()->with('success', 'Projet Créé avec succès');
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

         // Envoyer une notification de mise à jour aux utilisateurs assignés
        foreach ($project->users as $user) {
            if ($user->id !== Auth::id()) {
                // Envoyer la notification de mise à jour
                $notificationId = Str::uuid();
                $user->notify(new ProjectNotification($project, 'updated', $user->name, $notificationId));
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

         // Envoyer des notifications de suppression aux utilisateurs affectés
         foreach ($assignedUsers as $user) {
            if ($user->id !== Auth::id()) {
                $notificationId = Str::uuid();
                $user->notify(new ProjectNotification($project, 'deleted', $user->name, $notificationId));
            }
        }

        return back()->with('success', 'Projet supprimé avec succès');
    }
}
