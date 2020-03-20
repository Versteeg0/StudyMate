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

    public function subjects(){
        return  $this->belongsToMany(Subject::class, 'subject_teacher');
    }

    public function getSubjectAttribute(){
        return Teacher::find($this->id)->subjects()->get();
    }

    public function module(){
        return $this->hasMany(Subject::class);
    }

}
