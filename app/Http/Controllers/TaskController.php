<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{


    // Afficher toutes les tâches
    public function index()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Récupérer uniquement les tâches affectées à l'utilisateur connecté
        $tasksInProgress = Task::with('project', 'user')
            ->where('user_id', $user->id)
            ->where('statut', 'encours')
            ->get();

        $tasksNeedsReview = Task::with('project', 'user')
            ->where('user_id', $user->id)
            ->where('statut', 'review')
            ->get();

        $tasksCompleted = Task::with('project', 'user')
            ->where('user_id', $user->id)
            ->where('statut', 'complet')
            ->get();

        // Charger toutes les tâches qui concernent l'utilisateur connecté
        $tasks = Task::where('user_id', $user->id)->latest()->get();

        // Récupérer les notifications de l'utilisateur connecté
        $notifications = $user->notifications()->latest()->get();

        // Charger les projets et utilisateurs pour le modal de création
        $projects = Project::all();
        $users = User::all();

        return view('Admin.Task.index', compact('tasksInProgress', 'tasksNeedsReview', 'tasksCompleted', 'projects', 'users', 'tasks'));
    }


    // Afficher le formulaire de création de tâche
    public function create()
    {
        $projects = Project::all();
        $users = User::all();
        return view('Admin.Task.create', compact('projects', 'users'));
    }

    // Enregistrer une nouvelle tâche
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'statut' => 'required|string',
            'date_echeance' => 'required|date',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $task = Task::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'statut' => $request->statut,
            'date_echeance' => $request->date_echeance,
            'project_id' => $request->project_id,
            'user_id' => $request->user_id,
        ]);

        $task->project->statut = "encours";
        $task->project->save();


        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    // Afficher une tâche spécifique
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Afficher le formulaire de modification d'une tâche
    public function edit(Task $task)
    {
        $projects = Project::all();
        $users = User::all();
        return view('tasks.edit', compact('task', 'projects', 'users'));
    }

    // Mettre à jour une tâche existante
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'statut' => 'required|string',
            'date_echeance' => 'required|date',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $task->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'statut' => $request->statut,
            'date_echeance' => $request->date_echeance,
            'project_id' => $request->project_id,
            'user_id' => $request->user_id,
        ]);

        $project =  $task->project;
        $uncompletedTasks = $project->tasks->filter(function ($task) {
            if ($task->statut != "complet")
                return $task;
        })->count();

        if ($uncompletedTasks == 0) {
            $project->statut = "complet";
            $project->save();
        } else {
            $project->statut = "encours";
            $project->save();
        }

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    // Supprimer une tâche
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function updateStatus(Task $task)
    {
        // Valider la demande
        $validated = request()->validate([
            'statut' => 'required|in:encours,review,complet',
        ]);


        // Mettre à jour le statut de la tâche
        $task->statut = $validated['statut'];
        $task->save();

        // Retourner un message de succès et rediriger
        return redirect()->back()->with('success', 'Le statut de la tâche a été mis à jour avec succès.');
    }


}
