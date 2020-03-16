<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Session;

class FileController extends Controller
{
    public function index() {
        $aFiles = File::all();
        return view('file/index', ['aFiles' => $aFiles]);
    }

    public function createPage(Request $request) {
        return view('file.create');
    }

    public function create(Request $request) {
        $this->validate($request, [
            'filepath' => 'max:10000'
        ]);
        $oFile = new File();

        $oUpload = $request->file('filepath');
        $sPath = $oUpload->store('public');
        $oFile->filepath = $sPath;

        $oFile->save();
        Session::flash('message', 'Je File is geupload!');
        return redirect()->route('file.index');

    }
}
