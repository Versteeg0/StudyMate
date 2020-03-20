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

                <a href="{{ route('subject.index') }}" class="btn btn-primary">Terug naar overzicht</a>

                <h1>Vak Wijzigen</h1>
                <form method="post" action="{{ route('subject.edit.post', $oSubject->id) }}" class="row">
                    {{csrf_field()}}
                    <div class="col-6">
                        <div class="form-group">
                            <label>Vak naam</label>
                            <input type="text" name="subject_name" class="form-control" value="{{ $oSubject->subject_name}}">
                        </div>
                        <div class="form-group">
                            <label>Omschrijving</label>
                            <input type="text" name="subject_description" class="form-control" value="{{ $oSubject->subject_description}}" >
                        </div>
                        <div class="form-group">
                            <label>Categorie</label>
                            <input type="text" name="subject_category" class="form-control" value="{{ $oSubject->subject_category}}">
                        </div>
                        <div class="form-group">
                            <label for="select">Docenten</label>
                            <select multiple name="teachers[]" class="form-control">
                                @foreach($aTeachers as $teacher)
                                    <option value="{{$teacher->id}}" @if($oSubject->teachers->contains($teacher))selected="selected"@endif>{{$teacher->first_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Coordinator</label>
                            <select name="subject_coordinator" class="form-control">
                                @foreach($aTeachers as $teacher)
                                    <option value="{{$teacher->id}}" @if($teacher->id == $oSubject->coordinator) selected="selected" @endif>{{$teacher->first_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mijn Docent</label>
                            <select name="subject_is_my_teacher" class="form-control">
                                @foreach($aTeachers as $teacher)
                                    <option value="{{$teacher->id}}"  @if($teacher->id == $oSubject->teacher_id) selected="selected" @endif>{{$teacher->first_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Periode</label>
                            <input type="text" name="subject_period" class="form-control" value="{{ $oSubject->subject_period}}">
                        </div>
                        <div class="form-group">
                            <label>EC</label>
                            <input type="number" name="subject_ec" class="form-control" value="{{ $oSubject->subject_ec}}">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Vak wijzigen">
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

@endsection
