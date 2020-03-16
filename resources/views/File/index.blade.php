@extends('layouts.app')

@section('content')

    <div class="container no-max-width">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('file.createpage') }}" class="btn btn-danger">
                    Bestand uploaden
                </a>

                <table class="table table-dark">
                    <p/>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>File naam</th>
                        <th>Module naam</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($aFiles as $oFile)
                        <tr>
                            <td>{{$oFile->id}}</td>
                            <td>{{$oFile->filename}}</td>
                            <td>{{$oFile->module->module_name}}</td>
                            <td>
                                <a href="{{ route('file.download', $oFile->id) }}" class="btn btn-light">Download</a>
                            </td>
                            <td>
                               <a href="{{ route('file.delete', $oFile->id) }}" class="btn btn-danger">Verwijder</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
