@extends('layouts.app')

@section('content')
    <div class="container no-max-width">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('subject.createpage') }}" id="vakToevoegen" class="btn btn-danger">
                    Vak Toevoegen
                </a>

                <table class="table table-dark">
                    <p/>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Naam</th>
                        <th>Omschrijving</th>
                        <th>Categorie</th>
                        <th>Coordinator</th>
                        <th>Leraar</th>
                        <th>Periode</th>
                        <th>EC</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($aSubjects as $oSubject)
                        <tr>
                            <td>{{$oSubject->id}}</td>
                            <td>{{$oSubject->subject_name}}</td>
                            <td>{{$oSubject->subject_description}}</td>
                            <td>{{$oSubject->subject_category}}</td>
                            <td>{{$oTeachers->find($oSubject->coordinator->first_name)}}</td>
                            <td>{{$oSubject->teacher->first_name}}</td>
                            <td>{{$oSubject->subject_period}}</td>
                            <td>{{$oSubject->subject_ec}}</td>
                                <td>
                                    <a href="{{ route('subject.edit', $oSubject->id) }}" class="btn btn-primary">Bewerk</a>
                                </td>
                                <td>
                                    <a href="{{ route('subject.delete', $oSubject->id) }}" class="btn btn-danger">Verwijder</a>
                                </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
