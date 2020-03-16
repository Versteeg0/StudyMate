@extends('layouts.app')
@section('head')
    <link href="{{ asset('css/deadlinedetails.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <h1>Module: </h1>
                <h2>{{$module->module_name}}</h2>
                <br>
                <h3>Deadline: </h3>
                @if($module->assignment->deadline == null)
                    <h3>Niet gezet</h3>
                @else
                    <h3>{{date('d-m-Y', strtotime($module->assignment->deadline))}}</h3>
                @endif
                <br>
                <h3>Coördinator: </h3>
                <h3>{{$module->coordinator}}</h3>
                <br>
                <h4>Beschrijving:</h4>
                <p>{{$module->module_description}}</p>
                <br>
                <h4>Tags:</h4>
                    @foreach($module->assignment->tags as $tag)
                        <h5>{{$tag->tag_name}}</h5>
                    @endforeach
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
