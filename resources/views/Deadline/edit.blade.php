@extends('layouts.app')


@section('content')
    @component('Component/formError')
    @endcomponent
    <div class="container no-max-width">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form class="form" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Toets naam : {{ $oAssignment->name }}</label>
                    </div>
                    <div class="form-group">
                        <label for="deadline">Deadline</label>
                        <input type="date" class="form-control" name="deadline" value="{{ date('Y-m-d', strtotime($oAssignment->deadline)) }}" class="form-validation form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="select">Tags</label>
                        <select multiple name="tags[]" class="form-control">
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}" @if($oAssignment->tags->contains($tag))selected="selected"@endif>{{$tag->tag_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="isChecked">Afgerond</label> <br>
                        <input name="checkbox" type="checkbox" @if($oAssignment->isChecked == 1)checked="checked"@endif >
                    </div>
                    <div class="form-group">
                        <label for="isChecked">Cijfer</label> <br>
                        <input type="number" value="{{$oAssignment->grade}}" pattern="[0-9]+([\.][0-9]+)?" step="0.01" name="grade">
                    </div>
                    <input type="submit" value="Opslaan" class="btn btn-primary">
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
