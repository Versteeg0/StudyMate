<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $aSubjects = Subject::all();
        $aEC = array();
        $totalEC = null;
        $gainedEC = null;
        foreach($aSubjects as $subject){
            if($subject->isChecked == 1){
                $gainedEC = $gainedEC + $subject->subject_ec;
                if(!in_array($subject->subject_period, $aEC)){
                    $aEC[$subject->subject_period] = $subject->subject_ec;
                }  else {
                    $aEC[$subject->subject_period] =  $aEC[$subject->subject_period] + $subject->subject_ec;
                }
            }
            $totalEC = $totalEC + $subject->subject_ec;
        }
        $aPeriods = array_keys($aEC);
        if($totalEC > 0){
            $aPercentage = ($gainedEC * 100) / $totalEC;

        }else{
            $aPercentage = 100;
    }
        return view('home', ['aSubjects' => $aSubjects, 'aPeriods' => $aPeriods, 'aEC' => $aEC, 'totalEC' => $totalEC, 'gainedEC' => $gainedEC, 'percentageEC' => $aPercentage]);
    }
}
