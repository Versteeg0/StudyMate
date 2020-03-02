<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function teachers(){
        return  $this->belongsToMany(Teacher::class);
    }

    public function assignments(){
        return $this->belongsToMany(Assignment::class);
    }
}
