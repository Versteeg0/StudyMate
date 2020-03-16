<?php

namespace App\Http\Controllers;

use App\File;
use App\Module;
use Illuminate\Http\Request;
use Session;
use Storage;

class FileController extends Controller
{
    public function index() {
        $aFiles = File::all();
        $aModules = Module::all();
        return view('file/index', ['aFiles' => $aFiles, 'aModules' => $aModules]);
    }

    public function createPage(Request $request) {
        $aModules = Module::all();
        return view('file.create', ['aModules' => $aModules]);
    }


    public function delete(Request $request, $iId) {
        $oFile = File::find($iId);
        Storage::delete($oFile->filepath);
        $oFile->delete();
        return redirect()->route('file.index');

    }


    public function create(Request $request) {
        $this->validate($request, [
            'filepath' => 'required|max:10000'
        ]);
        $oFile = new File();

        $oUpload = $request->file('filepath');
        $sPath = $oUpload->store('public');
        $oFile->filepath = $sPath;
        $oFile->filename = $oUpload->getClientOriginalName();
        $oFile->module()->associate(Module::find($request->module));


        $oFile->save();
        Session::flash('message', 'Je File is geupload!');
        return redirect()->route('file.index');

    }

    public function download($iId) {
        $oDownload = File::find($iId);

        if(empty($oDownload->id)) {
            $oDownload = new File;
            $oDownload->file_id = $iId;
            $oDownload->save();
        }
        return response()->download(storage_path("app/{$oDownload->filepath}"));
    }
}
