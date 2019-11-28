<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
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
     * Task belongs to project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    /**
     * tasks taken by user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taker()
    {
        return $this->belongsTo('App\User', 'taken_by');
    }

    /**
     * tasks completed by user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function completer()
    {
        return $this->belongsTo('App\User', 'completed_by');
    }

}
