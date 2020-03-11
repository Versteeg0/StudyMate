@extends('layouts.app')

@section('content')
    <div class="container no-max-width">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <a href="{{ route('teacher.createpage') }}" class="btn btn-danger">
                    Docent Toevoegen
                </a>

                <table class="table table-dark">
                    <p/>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Voornaam</th>
                        <th>Prefix</th>
                        <th>Achternaam</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($aTeachers as $oTeacher)
                        <tr>
                            <td>{{$oTeacher->id}}</td>
                            <td>{{$oTeacher->first_name}}</td>
                            <td>{{$oTeacher->prefix}}</td>
                            <td>{{$oTeacher->last_name}}</td>
                                <td>
                                    <a href="{{ route('teacher.edit', $oTeacher->id) }}" class="btn btn-primary">Bewerk</a>
                                    <a href="{{ route('teacher.delete', $oTeacher->id) }}" class="btn btn-danger">Verwijder</a>
                                </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
