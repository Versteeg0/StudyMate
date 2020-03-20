<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Assignment;
use \App\Subject;
use \App\Tag;
use \App\Teacher;

class DeadlineController extends Controller
{
    public function index(){
        $aSubjects = Subject::all();
        $aTeachers = Teacher::all();
        return view('Deadline/index', ['subjects' => $aSubjects, 'teachers' => $aTeachers]);
    }

    public function editPage(Request $request, $iId) {
        $subject = Subject::find($iId);
        $tags = Tag::all();
        if (is_null($subject)) {
            return redirect()->route("deadline.index");
        }
        return view("deadline/edit", [
            "subject" => $subject, "tags" => $tags
        ]);
    }

    public function edit(Request $request, $iId) {
        if(!empty($request->grade) || isset($_POST['checkbox'])){
            $request->validate([
                'grade' => 'numeric|between:5.50,10.00',
                'checkbox' => 'accepted',
            ]);
        }

        $subject = Subject::find($iId);
        if (is_null($subject)) {
            return redirect()->route("deadline.index");
        }
        if(isset($request['checkbox'])){
            $subject->isChecked = 1;
        }else{
            $subject->isChecked = 0;
        }
        $subject->grade = $request->grade;
        $subject->save();
        $subject->assignment->deadline = $request->deadline;

        $subject->assignment->tags()->sync(request('tags'));
        $subject->assignment->update();
        return redirect()->route("deadline.index");
    }

    public function details(Request $request, $iId){
        $subject = Subject::find($iId);
        if (is_null($subject)) {
            return redirect()->route("deadline.index");
        }
        return view('deadline.detail', ['subject' => $subject]);
    }

    public function sort(Request $request){
        $sortMethod = $request->sortName;
        $subjects = Subject::all();
        switch($sortMethod){
            case "Subject":
                $subjects = Subject::orderBy('subject_name')->get();
                break;
            case "Docent":
                $subjects = Subject::with('teacher')->get()->sortBy('teacher.first_name');
                break;
            case "Deadline":
                $subjects = Subject::with('assignment')->get()->sortBy('assignment.deadline');
                break;
            case "Categorie":
                $subjects = Subject::orderBy('subject_category')->get();
                break;
        }

        return view('Deadline/index', ['subjects' => $subjects]);
    }
}
