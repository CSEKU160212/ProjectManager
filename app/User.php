<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Projects creator
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectCreators()
    {
        return $this->hasMany('App\Models\Project');
    }

    /**
     * Projects that User working
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany('App\Models\Project');
    }

    /**
     * user takes many tasks
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taken_tasks()
    {
        return $this->hasMany('App\Models\Task');
    }

    /**
     * user completed tasks
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function completed_tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
