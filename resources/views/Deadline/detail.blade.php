@extends('layouts.app')
@section('head')
    <link href="{{ asset('css/deadlinedetails.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <h1>Toets: </h1>
                <h2>{{$oAssignment->name}}</h2>
                <h3>Module: </h3>
                <h3>{{$oAssignment->module->module_name}}</h3>
                <br>
                <h3>Deadline: </h3>
                @if($oAssignment->deadline == null)
                    <h3>Niet gezet</h3>
                @else
                    <h3>{{date('d-m-Y', strtotime($oAssignment->deadline))}}</h3>
                @endif
                <br>
                <h3>Te verdienen EC:</h3>
                <h3>{{$oAssignment->ec}}</h3>
                <h3>Docent: </h3>
                <h3>{{$oAssignment->module->teacher->first_name}}</h3>
                <br>
                <h4>Beschrijving:</h4>
                <p>{{$oAssignment->module->module_description}}</p>
                <br>
                <h4>Tags:</h4>
                    @foreach($oAssignment->tags as $tag)
                        <h5>{{$tag->tag_name}}</h5>
                    @endforeach
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
