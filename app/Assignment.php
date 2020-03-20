<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;

class Assignment extends Model
{
    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'assignments_tags');
    }

    public function getTagsAttribute(){
        return Assignment::find($this->id)->tags()->get();
    }

    protected $fillable = [
        'id',
        'startdate',
        'enddate',
        'file'
    ];
}
