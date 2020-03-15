@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="jumbotron">
            @component('component/formError')
            @endcomponent
            @if(Session::has('message'))
                <p class="alert alert-info">{{Session::get('message')}} </p>
            @endif
            <form action="{{ route('file.store.post') }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="file">Bestanden uploaden</label>
                    <input type="file" name="file" class="form-control-file" id="file">
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-lg">Opslaan</button>
            </form>
        </div>
    </div>

@endsection
