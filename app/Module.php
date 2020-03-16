<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Assignment;
use App\Tag;

class Module extends Model
{
    public function teachers(){
        return  $this->belongsToMany(Teacher::class, 'module_teacher');
    }

    public function getTeachersAttribute(){
        return Module::find($this->id)->teachers()->get();
    }

    public function assignment(){
        return $this->hasOne(Assignment::class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function File(){
        return $this->hasOne(File::class);
    }


}
