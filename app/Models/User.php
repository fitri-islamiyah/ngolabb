<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function projects()
    {
        return $this->belongsToMany(Project::class)
                    ->withPivot('role')
                    ->withTimestamps();
    }

    public function pivotRole($projectId)
    {
        $relation = $this->projects()->where('project_id', $projectId)->first();
        return $relation ? $relation->pivot->role : null;
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function tasks()
        {
            return $this->hasMany(Task::class, 'assigned_to');
        }

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}

