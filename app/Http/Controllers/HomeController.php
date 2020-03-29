<?php

namespace App\Http\Controllers;

use App\Module;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /*
     * Get all the modules with finished assessments
     * for these modules calculate the gained EC and add them to a dictionary in the correct period
     */
    public function index()
    {
        $aModules = Module::all();
        $aEC = array();
        $aFinishedModules = array();
        $totalEC = null;
        $gainedEC = null;
        foreach($aModules as $oModule){
            $totalEC = $totalEC + $oModule->total_ec;
            if($oModule->isFinishedAttribute() == true){
                array_push($aFinishedModules, $oModule);
                foreach($oModule->assignments as $oAssignment) {
                    if($oAssignment->isChecked == 1){
                        $gainedEC = $gainedEC + $oAssignment->ec;
                        if(!array_key_exists($oModule->module_period, $aEC)){
                            $aEC[$oModule->module_period] = $oAssignment->ec;
                        }  else {
                            $aEC[$oModule->module_period] = $aEC[$oModule->module_period] + $oAssignment->ec;
                        }
                    }

                }
            }
        }
        $aPeriods = array_keys($aEC);
        if($totalEC > 0){
            $aPercentage = ($gainedEC * 100) / $totalEC;
        }else{
            $aPercentage = 100;
        }
        return view('home', ['aModules' => $aFinishedModules, 'aPeriods' => $aPeriods, 'aEC' => $aEC, 'totalEC' => $totalEC, 'gainedEC' => $gainedEC, 'percentageEC' => $aPercentage]);
    }
}
