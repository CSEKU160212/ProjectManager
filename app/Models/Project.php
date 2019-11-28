<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * mass assignable attributes
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    /**
     * Project Created by User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function projectCreator()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * users working on project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * project has many tasks
     *
     * @return void
     */
    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
