<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class ProjectNotification extends Notification
{
    private $project;
    private $status;
    private $userName;
    private $notificationId;

    public function __construct($project, $status, $userName, $notificationId)
    {
        $this->project = $project;
        $this->status = $status;
        $this->userName = $userName;
        $this->notificationId = $notificationId;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->userName . ' a créé un projet : ' . $this->project->name,
            'user_name' => $this->userName,
            'project_id' => $this->project->id,
            'status' => $this->status,
            'data' => json_encode([
                'url' => url('/projects/' . $this->project->id)
            ]),
        ];
    }
}
