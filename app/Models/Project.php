<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'date_debut',
        'date_fin',
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
