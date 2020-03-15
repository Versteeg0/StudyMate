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

                <a href="{{ route('module.index') }}" class="btn btn-primary">Terug naar overzicht</a>

                <h1>Module Wijzigen</h1>
                <form method="post" action="{{ route('module.edit.post', $oModule->id) }}" class="row">
                    {{csrf_field()}}
                    <div class="col-6">
                        <div class="form-group">
                            <label>Module naam</label>
                            <input type="text" name="module_name" class="form-control" value="{{ $oModule->module_name}}">
                        </div>
                        <div class="form-group">
                            <label>Omschrijving</label>
                            <input type="text" name="module_description" class="form-control" value="{{ $oModule->module_description}}" >
                        </div>
                        <div class="form-group">
                            <label>Categorie</label>
                            <input type="text" name="module_category" class="form-control" value="{{ $oModule->module_category}}">
                        </div>
                        <div class="form-group">
                            <label>Coordinator</label>
                            <input type="number" name="coordinator" class="form-control" value="{{ $oModule->coordinator}}">
                        </div>
                        <div class="form-group">
                            <label>Leraar</label>
                            <input type="number" name="is_my_teacher" class="form-control" value="{{ $oModule->is_my_teacher}}">
                        </div>
                        <div class="form-group">
                            <label>Periode</label>
                            <input type="text" name="module_period" class="form-control" value="{{ $oModule->module_period}}">
                        </div>
                        <div class="form-group">
                            <label>EC</label>
                            <input type="number" name="module_ec" class="form-control" value="{{ $oModule->module_ec}}">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Module wijzigen">
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

@endsection
