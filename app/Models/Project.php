<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function users(){
        // return $this->hasMany(User::class);
        return $this->belongsToMany(User::class);
    }

    // public function tasks(){
    //     return $this->hasManyThrough(
    //         Task::class,
    //         User::class,
    //         'project_id', //Foreign key in user table
    //         'user_id', //Foreign key in Task table
    //         'id' //Local key in project table
    //     );
    // }

    // public function task(){
    //     return $this->hasOneThrough(Task::class,User::class,'project_id','user_id','id');
    // }

    public function tasks(){
        return $this->hasManyThrough(
            Task::class,
            Team::class,
            'project_id', //in pivot table
            'user_id', //Foreign key in Task table
            'id', //Local key in project table
            'user_id', //in pivot table
        );
    }

    public function task(){
        return $this->hasOneThrough(Task::class,Team::class,'project_id','user_id','id','user_id');
    }
}
