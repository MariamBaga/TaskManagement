<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'nom',
        'priority',
        'category',
        'budjet',
        'icon',
        'description',
        'date_debut',
        'date_fin',
        'statut',
    ];

    protected $casts = [
        'date_debut' => 'date:m/d/Y',
        'date_fin' => 'date:m/d/Y',
    ];

    // relationship methods

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'affecters')
            ->as('affectations')
            ->using(Affecter::class)
            ->withTimestamps();
    }
}
