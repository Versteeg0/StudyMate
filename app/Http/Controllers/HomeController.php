<?php

namespace App\Http\Controllers;

use App\Module;
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
        $aModules = Module::all();
        $aEC = array();
        $totalEC = null;
        $gainedEC = null;
        foreach($aModules as $module){
            if($module->isChecked == 1){
                $gainedEC = $gainedEC + $module->module_ec;
                if(!in_array($module->module_period, $aEC)){
                    $aEC[$module->module_period] = $module->module_ec;
                }  else {
                    $aEC[$module->module_period] =  $aEC[$module->module_period] + $module->module_ec;
                }
            }
            $totalEC = $totalEC + $module->module_ec;
        }
        $aPeriods = array_keys($aEC);
        $aPercentage = ($gainedEC * 100) / $totalEC;
        return view('home', ['aModules' => $aModules, 'aPeriods' => $aPeriods, 'aEC' => $aEC, 'totalEC' => $totalEC, 'gainedEC' => $gainedEC, 'percentageEC' => $aPercentage]);
    }
}
