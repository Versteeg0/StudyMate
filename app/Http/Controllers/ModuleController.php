<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Module;
use \App\Teacher;
use \App\Assignment;
use PhpParser\Node\Expr\Assign;

class ModuleController extends Controller
{
    public function index()
    {
        $aModules = Module::all();
        $aTeachers = Teacher::all();
        return view('Module/index', [
            'aModules' => $aModules, 'aTeachers' => $aTeachers
        ]);
    }

    public function createPage(Request $request) {
        $aTeachers = Teacher::all();
        return view('module.create', ['aTeachers' => $aTeachers]);
    }

    public function create(Request $request)
    {
        $request->validate( [
            'module_module_name' => 'required|max:255',
            'module_module_description' => 'required|max:255',
            'module_coordinator' => 'required|max:255',
            'teachers' => 'required|min:1',
            'module_is_my_teacher' => 'required|max:255',
            'module_module_category' => 'required|max:255',
            'module_module_period' => 'required|max:255',
            'module_module_ec' => 'required|max:255'
        ]);



        $oModule = new Module();
        $oModule->module_name = $request->module_module_name;
        $oModule->module_description = $request->module_module_description;
        $oModule->coordinator = $request->module_coordinator;
        $oModule->module_category = $request->module_module_category;
        $oModule->module_period = $request->module_module_period;
        $oModule->module_ec = $request->module_module_ec;
        $oModule->isChecked = 0;
        $oModule->teacher()->associate(Teacher::find($request->module_is_my_teacher))->save();
        $oModule->save();
        $oModule->teachers()->sync(request('teachers'));

        $oAssignment = new Assignment();
        $oAssignment->module()->associate($oModule);
        $oAssignment->save();

        return redirect()->route('module.index');
    }

    public function editPage($iId) {
        $oModule = Module::find($iId);
        $aTeachers = Teacher::all();
        return view('module.edit', ['oModule' => $oModule, 'aTeachers' => $aTeachers]);
    }

    public function edit(Request $request ,$iId)
    {
        $request->validate([
           'module_name' => 'required|max:255',
           'module_description' => 'required|max:255',
           'module_coordinator' => 'required|max:255',
            'teachers' => 'required|min:1',
            'module_is_my_teacher' => 'required|max:255',
           'module_category' => 'required|max:255',
           'module_period' => 'required|max:255',
           'module_ec' => 'required|max:255',
        ]);

        $oModule = Module::find($iId);

        if(is_null($oModule)) {
            return redirect()->route('module.index');
        }

        $oModule->module_name = $request->get('module_name');
        $oModule->module_description = $request->get('module_description');
        $oModule->coordinator = $request->get('module_coordinator');
        $oModule->module_category = $request->get('module_category');
        $oModule->module_period = $request->get('module_period');
        $oModule->module_ec = $request->get('module_ec');
        $oModule->teachers()->sync(request('teachers'));
        $oModule->teacher()->associate(Teacher::find($request->module_is_my_teacher))->save();
        $oModule->update();

        return redirect()->route('module.index');
    }

    public function delete(Request $request, $iId)
    {
        $oModule = Module::find($iId);

        if(!is_null($oModule)) {
            $oModule->delete();
        }
        return redirect()->route('module.index');
    }
}
