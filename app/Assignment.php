<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Module;

class Assignment extends Model
{
    public function module(){
        return $this->belongsTo(Module::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'assignment_tags');
    }

    public function getTagAttribute(){
        return Assignment::find($this->id)->tags()-get();
    }

    protected $fillable = [
        'id',
        'startdate',
        'enddate',
        'file'
    ];
}
