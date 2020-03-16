@extends('layouts.app')

@section('content')

    <div class="container no-max-width">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('file.createpage') }}" class="btn btn-danger">
                    Bestand aanmaken??
                </a>

                <table class="table table-dark">
                    <p/>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Filepath</th>
                        <th>Assignment NAAM OF ID?</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($aFiles as $oFile)
                        <tr>
                            <td>{{$oFile->id}}</td>
                            <td>{{$oFile->filepath}}</td>
                            <td>
                               {{-- <a href="{{ route('file.edit', $oFile->id) }}" class="btn btn-primary">Bewerk</a>--}}

                            </td>
                            <td>
                               {{-- <a href="{{ route('file.delete', $oFile->id) }}" class="btn btn-danger">Verwijder bestand</a>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
