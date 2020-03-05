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
                        <th >Deadline</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                    @foreach($assignments as $assignment)
                        <tr>
                        @foreach($assignment->modules as $module)
                            <td>{{$module->module_name}}</td>
                            <td>{{$module->coordinator}}</td>
                            <td>{{date('d-m-Y', strtotime($assignment->deadline))}}</td>
                            <td><a target="_blank" href="" class="btn btn-primary">Bekijk</a></td>
                            <td><a href="" class="btn btn-secondary">Bewerk</a></td>
                            <td><a href="" class="btn btn-danger">Verwijder</a></td>
                        @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
