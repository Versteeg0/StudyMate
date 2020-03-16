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
        $aPeriods = array();
        foreach($aModules as $module){
            if(!in_array($module->module_period, $aPeriods)){
                array_push($aPeriods, $module->module_period);
            }
        }
        return view('home', ['aModules' => $aModules, 'aPeriods' => $aPeriods]);
    }
}
