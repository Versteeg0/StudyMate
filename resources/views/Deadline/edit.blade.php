@extends('layouts.app')


@section('content')
    <div class="container no-max-width">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form class="form" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Assessment naam : {{ $module->module_name }}</label>
                    </div>

                    <div class="form-group">
                        <label>Deadline</label>
                        <input type="date" name="deadline" value="{{ $module->assignment->deadline }}" class="form-validation form-control" required>
                    </div>
                    <input type="submit" value="Opslaan" class="btn btn-primary">
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
