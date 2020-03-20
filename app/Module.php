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

    public function assignments(){
        return $this->hasMany(Assignment::class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function File(){
        return $this->hasOne(File::class);
    }

    public function getTotalECAttribute(){
        $totalEC = 0;
        foreach($this->assignments as $assignment){
            $totalEC = $totalEC + $assignment->ec;
        }
        return $totalEC;
    }

    public function getEarnedECAttribute(){
        $earnedEC = 0;
        foreach($this->assignments as $assignment){
            if($assignment->isChecked == true){
                $earnedEC = $earnedEC + $assignment->ec;
            }
        }
        return $earnedEC;
    }

    public function getAverageGradeAttribute(){
        $avgGrade = 0;
        $gradedAmount = 0;
        foreach($this->assignments as $assignment){
            if($assignment->isChecked == true){
                $avgGrade = $avgGrade + $assignment->grade;
                $gradedAmount++;
            }
        }
        return $avgGrade / $gradedAmount;
    }

    public function isFinishedAttribute(){
        foreach($this->assignments as $assignment){
            if($assignment->isChecked == true){
                return true;
            }
        }
        return false;
    }



}
