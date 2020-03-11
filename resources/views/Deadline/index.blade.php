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
                    @foreach($modules as $module)
                        <tr>
                            <td>{{$module->module_name}}</td>
                            <td>{{$module->coordinator}}</td>
                            @if($module->assignment->deadline == '01-01-1970')
                            <td>{{date('d-m-Y', strtotime($module->assignment->deadline))}}</td>
                            @else
                            <td>Deadline niet gezet</td>
                            @endif
                            <td><a href="{{ route('deadline.details', $module->id) }}" class="btn btn-primary">Bekijk</a></td>
                            <td><a href="{{ route('deadline.editPage', $module->id) }}" class="btn btn-secondary">Bewerk</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
