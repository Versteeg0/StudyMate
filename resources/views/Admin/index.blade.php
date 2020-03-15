@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Beheer</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Je bent ingelogd als admin!
                    </div>

                    <div class="container">
                        <div class="form-group">
                            <a href="teacher" class="btn btn-primary">Docent Beheer</a>
                        </div>

                        <div class="form-group">
                            <a href="module" class="btn btn-primary">Module Beheer</a>
                        </div>

                        <div class="form-group">
                            <a href="teacher.index" class="btn btn-primary">Bestand Beheer</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
