<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Assignment;
use \App\Module;
use PhpParser\Node\Expr\AssignOp\Mod;

class DeadlineController extends Controller
{
    public function index(){
        $modules = Module::all();
        return view('Deadline/index', ['modules' => $modules]);
    }

    public function editPage(Request $request, $iId) {
        $module = Module::find($iId);
        if (is_null($module)) {
            return redirect()->route("deadline.index");
        }
        return view("deadline/edit", [
            "module" => $module,
        ]);
    }

    public function edit(Request $request, $iId) {
        $validateData = $request->validate([
           'deadline' => 'required',
        ]);

        $module = Module::find($iId);
        if (is_null($module)) {
            return redirect()->route("deadline.index");
        }

        $module->assignment->deadline =$request->deadline;
        $module->assignment->update();

        return redirect()->route("deadline.index");
    }

    public function details(Request $request, $iId){
        $module = Module::find($iId);
        if (is_null($module)) {
            return redirect()->route("deadline.index");

        }
        return view('deadline.detail', ['modules' => $module]);
    }
}
