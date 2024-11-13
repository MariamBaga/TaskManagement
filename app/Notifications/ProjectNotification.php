<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ProjectNotification extends Notification
{
    use Queueable;

    private $project;
    private $status;
    private $userId;
    private $notificationId;

    public function __construct($project, $status, $userId, $notificationId)
    {
        $this->project = $project;
        $this->status = $status;
        $this->userId = $userId;
        $this->notificationId = $notificationId;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "Un projet nommé '{$this->project->nom}' a été {$this->status}.",
            'project_id' => $this->project->id,
            'status' => $this->status,
            'user_name' => $this->userId->name,
            'url' => url("/projects/{$this->project->id}"),
            'user_id' => $this->userId, // Inclure user_id ici
        ];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => "Un projet nommé '{$this->project->nom}' a été {$this->status}.",
            'project_id' => $this->project->id,
            'status' => $this->status,

            'user_name' => $this->userId->name,
            'url' => url("/projects/{$this->project->id}") ?? 'default_url',
            'user_id' => $this->userId, // Inclure user_id ici aussi
        ];
    }
}
