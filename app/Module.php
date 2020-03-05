<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Assignment;

class Module extends Model
{
    public function teachers(){
        return  $this->belongsToMany('App\Teacher');
    }

    public function getTeacherAttribute(){
        return Module::find($this->id)->courses()-get();
    }

    public function assignments(){
        return $this->belongsToMany(Assignment::class, 'assignment_module');
    }

    public function getAssignmentAttribute(){
        return Module::find($this->id)->Assignment()-get();
    }
}
