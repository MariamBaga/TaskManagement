<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class ProjectNotification extends Notification
{
    private $project;
    private $status;
    private $userName; // Mettez à jour le nom de la variable ici
    private $notificationId;


    public function __construct($project, $status, $userName, $notificationId)
    {
        $this->project = $project;
        $this->status = $status;
        $this->userName = $userName; // Utilisez $userName au lieu de $user_name
        $this->notificationId = $notificationId;
    }

    // Définir les canaux de notification (ici 'database' pour la base de données)
    public function via($notifiable)
    {
        return ['database']; // Vous pouvez ajouter d'autres canaux si nécessaire
    }

    // Définir les données à stocker dans la base de données
    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->userName . ' a créé un projet : ' . $this->project->name,
            'project_id' => $this->project->id,
            'status' => $this->status,
            'message' => "{$this->userName} a créé un projet : {$this->project->name}", // Utilisez $this->userName ici
            'url' => url('/projects/' . $this->project->id), // L'URL doit être correctement générée
        ];
    }

    // Vous pouvez aussi définir la méthode toMail, toBroadcast, etc., selon vos besoins
}
