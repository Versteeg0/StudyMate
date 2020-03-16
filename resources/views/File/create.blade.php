@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="jumbotron">
            @component('component/formError')
            @endcomponent

            @if(Session::has('message'))
                <p class="alert alert-info">{{Session::get('message')}} </p>
            @endif
            <form class="form" action="{{ route('file.create.post') }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="file">Bestanden uploaden</label>
                    <input type="file" name="filepath" class="form-control-file">
                </div>
                <input type="submit" value="opslaan" name="submit" class="btn btn-primary btn-lg">
            </form>
        </div>
    </div>

@endsection
