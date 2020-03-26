<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Teacher;

class TeacherController extends Controller
{
    public function index(){
        $aTeachers = Teacher::all();
        return view('Teacher/index', [
            'aTeachers' => $aTeachers
        ]);
    }

    public function createPage(Request $request) {
        return view('teacher.create');
    }

    public function create(Request $request) {
        $request->validate( [
            'teacher_first_name' => 'required|max:255',
            'teacher_prefix' => 'max:255',
            'teacher_last_name' => 'required|max:255'
        ]);

        $oTeacher = new Teacher();
        $oTeacher->first_name = $request->teacher_first_name;
        $oTeacher->prefix = $request->teacher_prefix;
        $oTeacher->last_name = $request->teacher_last_name;
        $oTeacher->save();
        return redirect()->route('teacher.index');
    }

    public function editPage($iId) {
        $oTeacher = Teacher::find($iId);
        return view('teacher.edit', ['oTeacher' => $oTeacher ]);
    }

    public function edit(Request $request, $iId)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'prefix' => 'max:255',
            'last_name' => 'required|max:255'
        ]);

        $oTeacher = Teacher::find($iId);
        if (is_null($oTeacher)) {
            return redirect()->route('teacher.index');
        }
        $oTeacher->first_name = $request->get('first_name');
        $oTeacher->prefix = $request->get('prefix');
        $oTeacher->last_name = $request->get('last_name');
        $oTeacher->update();
        return redirect()->route('teacher.index');
    }

    public function delete(Request $request, $iId) {
        $oTeacher = Teacher::find($iId);
        if(!is_null($oTeacher)) {
            $oTeacher->delete();
        }
        return redirect()->route('teacher.index');
    }
}
