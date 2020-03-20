<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Module;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Assign;

class AssignmentController extends Controller
{
    public function index()
    {
        $aAssignments = Assignment::all();
        return view('assignment/index', [
            'aAssignments' => $aAssignments
        ]);
    }

    public function createPage(Request $request) {
        $aModules = Module::all();

        return view('assignment.create', ['aModules' => $aModules]);

    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'module' => 'required',
            'ec' => 'required|integer'
        ]);

        $oAssignment = new Assignment();
        $oAssignment->name = $request->name;
        $oAssignment->ec = $request->ec;
        $oAssignment->module()->associate(Module::find($request->module));
        $oAssignment->save();
        return redirect()->route('assignment.index');
    }

    public function editPage($iId) {
        $oAssignment = Assignment::find($iId);
        $aModules = Module::all();
        return view('assignment.edit', ['oAssignment' => $oAssignment, 'aModules' => $aModules]);
    }

    public function edit(Request $request ,$iId)
    {
        $request->validate([
            'name' => 'required|max:255',
            'module' => 'required',
            'ec' => 'required|integer'
        ]);

        $oAssignment = Assignment::find($iId);
        $oAssignment->name = $request->name;
        $oAssignment->module()->associate(Module::find($request->module));
        $oAssignment->ec = $request->ec;
        $oAssignment->save();
        return redirect()->route('assignment.index');
    }

    public function delete(Request $request, $iId)
    {
        $oAssignment = Assignment::find($iId);

        if(!is_null($oAssignment)) {
            $oAssignment->delete();
        }
        return redirect()->route('assignment.index');
    }

}
