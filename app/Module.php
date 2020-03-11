<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Assignment;

class Module extends Model
{
    public function teacher(){
        return  $this->belongsToMany('App\Teacher');
    }

    public function getTeacherAttribute(){
        return Module::find($this->id)->courses()-get();
    }

    public function assignment(){
        return $this->hasOne(Assignment::class);
    }

}
