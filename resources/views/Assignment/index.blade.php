@extends('layouts.app')

@section('content')
    <div class="container no-max-width">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('assignment.createpage') }}" id="assignmentAdd" class="btn btn-danger">
                    Toets Toevoegen
                </a>

                <table class="table table-dark">
                    <p/>
                    <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Module</th>
                        <th>EC</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($aAssignments as $oAssignment)
                        <tr>
                            <td>{{$oAssignment->name}}</td>
                            <td>{{$oAssignment->module->module_name}}</td>
                            <td>{{$oAssignment->ec}}</td>
                            <td>
                                <a href="{{ route('assignment.edit', $oAssignment->id) }}" class="btn btn-primary">Bewerk</a>
                                <a href="{{ route('assignment.delete', $oAssignment->id) }}" class="btn btn-danger">Verwijder</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
