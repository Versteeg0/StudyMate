@extends('layouts.app')

@section('content')
    @component('Component/formError')
    @endcomponent

    <div class="container no-max-width">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                @component('component/formError')
                @endcomponent

                <a href="{{ route('teacher.index') }}" class="btn btn-primary">Terug naar overzicht</a>

                <h1>Docent Wijzigen</h1>
                <form method="post" action="{{ route('teacher.edit.post', $oTeacher->id) }}" class="row">
                    {{csrf_field()}}
                    <div class="col-6">
                        <div class="form-group">
                            <label>Voornaam</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $oTeacher->first_name}}">
                        </div>
                        <div class="form-group">
                            <label>Prefix</label>
                            <input type="text" name="prefix" class="form-control" value="{{ $oTeacher->prefix}}" >
                        </div>
                        <div class="form-group">
                            <label>Achternaam</label>
                            <input type="text" name="last_name" class="form-control" value="{{ $oTeacher->last_name}}">

                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Docent Wijzigen">
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

@endsection
