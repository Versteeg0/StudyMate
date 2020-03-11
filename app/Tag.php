<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Assign;

class Tag extends Model
{
    public function assignments(){
        return $this->belongsToMany(Assignment::class, 'assignment_tags');
    }

    public function getAssignmentAttribute(){
        return Tag::find($this->id)->assignments()-get();
    }
}
