<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'titre',
        'description',
        'statut',
        'project_id',
        'user_id',
        'date_echeance',
    ];

    protected $casts = [
        'date_echeance' => "date",
    ];

    // relationship methods
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
