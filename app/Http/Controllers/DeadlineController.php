<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeadlineController extends Controller
{
    public function index(){
        $assignments = \App\Assignment::all();
        return view('Deadline/index', ['assignments' => $assignments]);
    }


}
