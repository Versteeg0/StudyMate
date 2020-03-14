<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Assignment;
use \App\Module;
use \App\Tag;

class DeadlineController extends Controller
{
    public function index(){
        $modules = Module::all();
        return view('Deadline/index', ['modules' => $modules]);
    }

    public function editPage(Request $request, $iId) {
        $module = Module::find($iId);
        $tags = Tag::all();
        if (is_null($module)) {
            return redirect()->route("deadline.index");
        }
        return view("deadline/edit", [
            "module" => $module, "tags" => $tags
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
        if(isset($request['checkbox'])){
            $module->isChecked = 1;
        }else{
            $module->isChecked = 0;
        }
        $module->save();
        $module->assignment->deadline = $request->deadline;
        $module->assignment->tags()->sync(request('tags'));
        $module->assignment->update();

        return redirect()->route("deadline.index");
    }

    public function details(Request $request, $iId){
        $module = Module::find($iId);
        if (is_null($module)) {
            return redirect()->route("deadline.index");
        }
        return view('deadline.detail', ['module' => $module]);
    }

    public function sort(Request $request){
        $sortMethod = $request->sortName;
        $modules = Module::all();
        switch($sortMethod){
            case "Naam":
                $modules = Module::orderBy('module_name')->get();
                break;
            case "Docent":
                $modules = Module::orderBy('coordinator')->get();
                break;
            case "Deadline":
                $modules = Module::with('assignment')->get()->sortBy('assignment.deadline');
                break;
            case "Categorie":
                $modules =  Module::with('assignment')->assignment()->tags()->first()->orderBy('tag.tag_name');
                break;
        }

        return view('Deadline/index', ['modules' => $modules]);
    }
}
