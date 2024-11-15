<?php

namespace App\Notifications;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class TaskStatusUpdated extends Notification
{
    use Queueable;

    protected $task;
    protected $message;

    public function __construct(Task $task, $message)
    {
        $this->task = $task;
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'task_id' => $this->task->id,
            'message' => $this->message,
            'task_title' => $this->task->titre,
            'project_name' => $this->task->project->nom, // Inclure le nom du projet
            'status' => $this->task->statut,
            'url' => url("/tasks/{$this->task->id}"),
           'user_name' => Auth::user()->name,  // Utilisateur assigné
        ];
    }

    public function toArray($notifiable)
    {
        return [
            'user_name' => Auth::user()->name,  // Utilisateur qui effectue l'action
            'message' => "Nouvelle tâche assignée : {$this->task->title}",
            'url' => route('tasks.show', $this->task->id),  // Lien vers la tâche

        ];
    }
}
