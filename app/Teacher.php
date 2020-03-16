<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function modules(){
        return  $this->belongsToMany(Module::class, 'module_teacher');
    }

    public function getModuleAttribute(){
        return Teacher::find($this->id)->modules()->get();
    }

    public function module(){
        return $this->hasMany(Module::class);
    }
}
