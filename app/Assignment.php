<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function modules(){
        return $this->belongsToMany(Module::class);
    }

    protected $fillable = [
        'id',
        'startdate',
        'enddate',
        'file'
    ];
}
