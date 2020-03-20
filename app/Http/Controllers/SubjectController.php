<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Subject;
use \App\Teacher;
use \App\Assignment;
use PhpParser\Node\Expr\Assign;

class SubjectController extends Controller
{
    public function index()
    {
        $aSubjects = Subject::all();
        $aTeachers = Teacher::all();
        return view('Subject/index', [
            'aSubjects' => $aSubjects, 'aTeachers' => $aTeachers
        ]);
    }

    public function createPage(Request $request) {
        $aTeachers = Teacher::all();

        return view('subject.create', ['aTeachers' => $aTeachers]);
    }

    public function create(Request $request)
    {
        $request->validate( [
            'subject_name' => 'required|max:255',
            'subject_description' => 'required|max:255',
            'subject_coordinator' => 'required|max:255',
            'teachers' => 'required|min:1',
            'subject_is_my_teacher' => 'required|max:255',
            'subject_category' => 'required|max:255',
            'subject_period' => 'required|max:255',
            'subject_ec' => 'required|max:255'
        ]);



        $oSubject = new Subject();
        $oSubject->subject_name = $request->subject_name;
        $oSubject->subject_description = $request->subject_description;
        $oSubject->coordinator = $request->subject_coordinator;
        $oSubject->subject_category = $request->subject_category;
        $oSubject->subject_period = $request->subject_period;
        $oSubject->subject_ec = $request->subject_ec;
        $oSubject->isChecked = 0;
        $oSubject->teacher()->associate(Teacher::find($request->subject_is_my_teacher))->save();
        $oSubject->save();
        $oSubject->teachers()->sync(request('teachers'));

        $oAssignment = new Assignment();
        $oAssignment->subject()->associate($oSubject);
        $oAssignment->save();

        return redirect()->route('subject.index');
    }

    public function editPage($iId) {
        $oSubject = Subject::find($iId);
        $aTeachers = Teacher::all();
        return view('subject.edit', ['oSubject' => $oSubject, 'aTeachers' => $aTeachers]);
    }

    public function edit(Request $request ,$iId)
    {
        $request->validate([
           'subject_name' => 'required|max:255',
           'subject_description' => 'required|max:255',
           'subject_coordinator' => 'required|max:255',
            'teachers' => 'required|min:1',
            'subject_is_my_teacher' => 'required|max:255',
           'subject_category' => 'required|max:255',
           'subject_period' => 'required|max:255',
           'subject_ec' => 'required|max:255',
        ]);

        $oSubject = Subject::find($iId);

        if(is_null($oSubject)) {
            return redirect()->route('subject.index');
        }

        $oSubject->subject_name = $request->get('subject_name');
        $oSubject->subject_description = $request->get('subject_description');
        $oSubject->coordinator = $request->get('subject_coordinator');
        $oSubject->subject_category = $request->get('subject_category');
        $oSubject->subject_period = $request->get('subject_period');
        $oSubject->subject_ec = $request->get('subject_ec');
        $oSubject->teachers()->sync(request('teachers'));
        $oSubject->teacher()->associate(Teacher::find($request->subject_is_my_teacher))->save();
        $oSubject->update();

        return redirect()->route('subject.index');
    }

    public function delete(Request $request, $iId)
    {
        $oSubject = Subject::find($iId);

        if(!is_null($oSubject)) {
            $oSubject->delete();
        }
        return redirect()->route('subject.index');
    }
}
