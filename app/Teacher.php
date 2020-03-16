<?php

namespace App;

use App\Http\Traits\Encryptable;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use Encryptable;
    protected $encryptable = [
        'first_name',
        'prefix',
        'last_name',
    ];

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
