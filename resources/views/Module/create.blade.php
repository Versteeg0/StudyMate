@extends('layouts.app')

@section('content')
    @component('Component/formError')
    @endcomponent

    <div class="container no-max-width">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">

                <a href="{{ route('module.index') }}" class="btn btn-primary">Terug naar overzicht</a>

                <h1>Module toevoegen</h1>
                <form method="post" class="row">
                    {{csrf_field()}}
                    <div class="col-6">
                        <div class="form-group">
                            <label>Module naam</label>
                            <input type="text" name="module_module_name" class="form-control" value="{{ old('module_module_name') }}">
                        </div>

                        <div class="form-group">
                            <label>Omschrijving</label>
                            <input type="text" name="module_module_description" class="form-control" value="{{ old('module_module_description') }}">
                        </div>

                        <div class="form-group">
                            <label>Categorie</label>
                            <input type="text" name="module_module_category" class="form-control" value="{{ old('module_module_category') }}">
                        </div>

                        <div class="form-group">
                            <label for="select">Docenten</label>
                            <select multiple name="teachers[]" class="form-control">
                                @foreach($aTeachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->first_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Coordinator</label>
                            <select name="module_coordinator" class="form-control" value="">
                                @foreach($aTeachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->first_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Mijn Docent</label>
                            <select name="module_is_my_teacher" class="form-control" value="">
                                @foreach($aTeachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->first_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Periode</label>
                            <input type="text" name="module_module_period" class="form-control" value="{{ old('module_module_period') }}">
                        </div>

                        <div class="form-group">
                            <label>EC</label>
                            <input type="number" name="module_module_ec" class="form-control" value="{{ old('module_module_ec') }}">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Module Toevoegen">
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

@endsection
