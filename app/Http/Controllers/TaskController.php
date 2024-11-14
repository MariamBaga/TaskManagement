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

        // Vérifier si l'utilisateur est un administrateur
        if ($user->role == 'admin') {  // Supposons que le champ 'role' détermine le rôle de l'utilisateur
            // Si c'est un administrateur, récupérer toutes les tâches
            $tasksInProgress = Task::with('project', 'user')
                ->where('statut', 'encours')
                ->get();

            $tasksNeedsReview = Task::with('project', 'user')
                ->where('statut', 'review')
                ->get();

            $tasksCompleted = Task::with('project', 'user')
                ->where('statut', 'complet')
                ->get();

            $tasks = Task::all();  // Récupérer toutes les tâches pour l'administrateur
        } else {
            // Sinon, récupérer uniquement les tâches assignées à l'utilisateur connecté
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
        }

        // Récupérer les notifications de l'utilisateur connecté
        $notifications = $user->notifications()->latest()->get();

        // Charger les projets et utilisateurs pour le modal de création
        $projects = Project::all();
        $users = User::all();

        // Retourner la vue avec les données appropriées
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
// Notification à l'utilisateur assigné à la tâche
$task->user->notify(new \App\Notifications\TaskStatusUpdated($task, 'Une nouvelle tâche vous a été assignée.'));

// Notification à l'utilisateur actuel (celui qui effectue l'action)
Auth::user()->notify(new \App\Notifications\TaskStatusUpdated($task, 'Vous avez créé une nouvelle tâche.'));


        $task->project->statut = "encours";
        $task->project->save();



        return redirect()->route('tasks.index')->with('success', 'Tâche créé avec succès');
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
 // Notification à l'utilisateur assigné à la tâche
 $task->user->notify(new \App\Notifications\TaskStatusUpdated($task, 'Le statut de votre tâche a été mis à jour.'));

 // Notification à l'utilisateur actuel (celui qui effectue l'action)
 Auth::user()->notify(new \App\Notifications\TaskStatusUpdated($task, 'Vous avez mis à jour une tâche.'));

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

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès.');
    }

    // Supprimer une tâche
    public function destroy(Task $task)
    {
        // Notification à l'utilisateur assigné à la tâche
    $task->user->notify(new \App\Notifications\TaskStatusUpdated($task, 'Votre tâche a été supprimée.'));

    // Notification à l'utilisateur actuel (celui qui effectue l'action)
    Auth::user()->notify(new \App\Notifications\TaskStatusUpdated($task, 'Vous avez supprimé une tâche.'));


        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tâche supprimé avec succès.');
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

        // Créer un message spécifique selon le statut
        $statusMessages = [
            'encours' => 'La tâche est maintenant en cours.',
            'review' => 'La tâche est en attente de révision.',
            'complet' => 'La tâche a été terminée.',
        ];

        // Notifier l'utilisateur assigné à la tâche
        $task->user->notify(new \App\Notifications\TaskStatusUpdated($task, $statusMessages[$task->statut]));

        // Retourner un message de succès et rediriger
        return redirect()->back()->with('success', 'Le statut de la tâche a été mis à jour avec succès.');
    }




}
