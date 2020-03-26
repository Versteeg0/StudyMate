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
                            <label for="select">Docenten</label>
                            <select multiple name="teachers[]" class="form-control">
                                @foreach($aTeachers as $teacher)
                                    <option value="{{$teacher->id}}" @if($oModule->teachers->contains($teacher))selected="selected"@endif>{{$teacher->first_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Coordinator</label>
                            <select name="module_coordinator" class="form-control">
                                @foreach($aTeachers as $teacher)
                                    <option value="{{$teacher->id}}" @if($teacher->id == $oModule->coordinator_id) selected="selected" @endif>{{$teacher->first_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mijn Docent</label>
                            <select name="module_is_my_teacher" class="form-control">
                                @foreach($aTeachers as $teacher)
                                    <option value="{{$teacher->id}}"  @if($teacher->id == $oModule->teacher_id) selected="selected" @endif>{{$teacher->first_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Periode</label>
                            <input type="number" name="module_period" class="form-control" value="{{ $oModule->module_period}}">
                        </div>
                        <div class="form-group">
                            <label>Blok</label>
                            <input type="number" name="module_block" class="form-control" value="{{ $oModule->module_block}}">
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
