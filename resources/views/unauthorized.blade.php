@extends('layouts.app')

@section('head')
    <link href="{{ asset('css/unauthorized.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Geen toegang</div>

                    <div class="card-body">
                    <strong>Je hebt niet de juiste rechten om deze pagina te mogen bekijken</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
