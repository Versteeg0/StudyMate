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
                <h2>{{$modules->module_name}}</h2>
                <br>
                <h3>Deadline: </h3>
                @if($modules->assignment->deadline == '01-01-1970')
                    <h3>{{date('d-m-Y', strtotime($modules->assignment->deadline))}}</h3>
                @else
                    <h3>Niet gezet</h3>
                @endif
                <br>
                <h3>Coördinator: </h3>
                <h3>{{$modules->coordinator}}</h3>
                <br>
                <h4>Beschrijving:</h4>
                <p>{{$modules->module_description}}</p>
                <br>
                <h4>Tags:</h4>
                    <ul>
                    @foreach($modules->assignment->tag->tag_name as $tag)
                        <li> voor de tags</li>
                    @endforeach
                    </ul>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
