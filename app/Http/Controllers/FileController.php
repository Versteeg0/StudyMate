<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index() {
        $aFiles = File::all();
        return view('file/index', ['aFiles' => $aFiles]);
    }

    public function createPage(Request $request) {
        return view('file.create');
    }

    public function store(Request $request) {
        /*$this->validate($request, [
            'filepath' => 'required|max:10000'
        ]);*/

        if($request->hasFile('filepath')) {

            $filename = $request->file->getClientOriginalName();

            $request->file->StoreAs('public',$filename);

            $file = new File;
            $file->filepath = $filename;
            $file->save();
            return redirect()->route('file.index');
        }
        /*$oFile = $request->file('filepath')->store('public');
        $oFile = new File();

        $oUpload = $request->file('filepath');
        $sPath = $oUpload->store('public');
        $oFile->filepath = $sPath;

        Session::flash('message', 'Je File is geupload!');
        $oFile->save();*/

    }
}
