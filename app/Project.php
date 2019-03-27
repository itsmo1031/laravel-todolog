<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = ['name', 'description', ];    //1
 
    public function tasks() // 2
    {
        return $this->hasMany(Task::class);
    }
 
    public  function user() //3
    {
        return $this->belongsTo(User::class);
    }
}
