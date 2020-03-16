<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Session;
use Storage;

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
        $oFile->filename = $oUpload->getClientOriginalName();

        $oFile->save();
        Session::flash('message', 'Je File is geupload!');
        return redirect()->route('file.index');

    }

    public function download($iId) {
        $oDownload = File::find($iId);
        $url = Storage::disk('public')->url($oDownload->filepath);

        /*if(empty($oDownload->id)) {
            $oDownload = new File;
            $oDownload->file_id = $iId;
            $oDownload->save();
        }*/
        //$oDownload = $oDownload->filepath;
        return response()->download(public_path() . storage_path("{$oDownload->filepath}"));
    }
}
