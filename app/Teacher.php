<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function modules(){
        return  $this->belongsToMany(Module::class);
    }
}
