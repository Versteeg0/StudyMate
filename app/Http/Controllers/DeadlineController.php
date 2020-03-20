<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Assignment;
use \App\Module;
use \App\Tag;
use \App\Teacher;
use PhpParser\Node\Expr\Assign;

class DeadlineController extends Controller
{
    public function index(){
        $aAssignment = Assignment::all();
        return view('Deadline/index', ['aAssignments' => $aAssignment]);
    }

    public function editPage(Request $request, $iId) {
        $oAssignment = Assignment::find($iId);
        $aTags = Tag::all();
        if (is_null($oAssignment)) {
            return redirect()->route("deadline.index");
        }
        return view("deadline/edit", [
            "oAssignment" => $oAssignment, "tags" => $aTags
        ]);
    }

    public function edit(Request $request, $iId) {
        if(!empty($request->grade) || isset($_POST['checkbox'])){
            $request->validate([
                'grade' => 'numeric|between:5.50,10.00',
                'checkbox' => 'accepted',
            ]);
        }

        $oAssignment = Assignment::find($iId);
        if (is_null($oAssignment)) {
            return redirect()->route("deadline.index");
        }
        if(isset($request['checkbox'])){
            $oAssignment->isChecked = 1;
        }else{
            $oAssignment->isChecked = 0;
        }
        $oAssignment->grade = $request->grade;
        $oAssignment->deadline = $request->deadline;
        $oAssignment->save();


        $oAssignment->tags()->sync(request('tags'));
        return redirect()->route("deadline.index");
    }

    public function details(Request $request, $iId){
        $oAssignment = Assignment::find($iId);
        if (is_null($oAssignment)) {
            return redirect()->route("deadline.index");
        }
        return view('deadline.detail', ['oAssignment' => $oAssignment]);
    }

    public function sort(Request $request){
        $sortMethod = $request->sortName;
        $aAssignments = Assignment::all();
        switch($sortMethod){
            case "Module":
                $aAssignments = Assignment::with('module')->get()->sortBy('module.module_name');
                break;
            case "Docent":
                $aAssignments = Assignment::with('module')->get()->sortBy('module.teacher_id');
                break;
            case "Deadline":
                $aAssignments = Assignment::all()->sortBy('deadline');
                break;
            case "Categorie":
                $aAssignments = Assignment::with('module')->get()->sortBy('module.module_category');
                break;
        }

        return view('Deadline/index', ['aAssignments' => $aAssignments]);
    }
}
