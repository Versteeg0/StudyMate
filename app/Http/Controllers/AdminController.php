<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function index(){
            return view('Admin/index');
    }

    public function create(){
        return view('admin/create');
    }

    public function edit(){
        return view('admin/create');
    }

    public function delete(){
        return view('admin/delete');
    }
}
