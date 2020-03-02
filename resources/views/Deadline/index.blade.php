@extends('layouts.app')
<link href="{{ asset('css/deadlinemanager.css') }}" rel="stylesheet">

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="header">
                    <h4>Welkom bij de Deadline Manager</h4>
                </div>
                <table class="table table-dark">
                    <thead>
                        <th>Naam</th>
                        <th >Coördinator</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                    @foreach($Assignments as $assignment)
                        <tr>
                            <td>{{$module->module_name}}</td>
                            <td>{{$module->coordinator}}</td>
                            <td><a target="_blank" href="" class="btn btn-primary">Bekijk</a></td>
                            <td><a href="" class="btn btn-secondary">Bewerk</a></td>
                            <td><a href="" class="btn btn-danger">Verwijder</a></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
