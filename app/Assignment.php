<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Module;

class Assignment extends Model
{
    public function modules(){
        return $this->belongsToMany(Module::class, 'assignment_module');
    }

    public function getModuleAttribute(){
        return Assignment::find($this->id)->modules()-get();
    }

    protected $fillable = [
        'id',
        'startdate',
        'enddate',
        'file'
    ];
}
