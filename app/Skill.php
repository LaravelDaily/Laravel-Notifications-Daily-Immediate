<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use SoftDeletes;

    public $table = 'skills';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function skillsJobs()
    {
        return $this->belongsToMany(Job::class);
    }

    public function skillsUsers()
    {
        return $this->belongsToMany(User::class);
    }
}
