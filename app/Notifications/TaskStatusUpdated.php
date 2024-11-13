<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class TaskStatusUpdated extends Notification
{
    private $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function via($notifiable)
    {
        return ['database']; // Indique que la notification sera envoyée via la base de données
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "Le statut de la tâche '{$this->task->titre}' a été mis à jour.",
            'task_id' => $this->task->id,
            'url' => url('/tasks/' . $this->task->id),
        ];
    }
}
