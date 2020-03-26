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

    public function coordinator(){
        return $this->belongsTo(Teacher::class, 'coordinator_id');
    }

    public function File(){
        return $this->hasOne(File::class);
    }

    /*
     * Gather the total EC's from every assignment in this module.
     */
    public function getTotalECAttribute(){
        $totalEC = 0;
        foreach($this->assignments as $assignment){
            $totalEC = $totalEC + $assignment->ec;
        }
        return $totalEC;
    }

    /*
    * Gather the total EC's from every assignment in this module.
    */
    public function getEarnedECAttribute(){
        $earnedEC = 0;
        foreach($this->assignments as $assignment){
            if($assignment->isChecked == true){
                $earnedEC = $earnedEC + $assignment->ec;
            }
        }
        return $earnedEC;
    }

    /*
    * Get the average grade of the module based on the grades of the assignments
    */
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

    /*
    * Check if the module has any finished assignments
    */
    public function isFinishedAttribute(){
        foreach($this->assignments as $assignment){
            if($assignment->isChecked == true){
                return true;
            }
        }
        return false;
    }



}
