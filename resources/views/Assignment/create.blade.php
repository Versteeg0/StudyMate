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

                <a href="{{ route('assignment.index') }}" class="btn btn-primary">Terug naar overzicht</a>

                <h1>Toets Wijzigen</h1>
                <form method="post" class="row">
                    {{csrf_field()}}
                    <div class="col-6">
                        <div class="form-group">
                            <label>Toets naam</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name')}}" required>
                        </div>

                        <div class="form-group">
                            <label>Module</label>
                            <select name="module" class="form-control" required>
                                @foreach($aModules as $module)
                                    <option value="{{$module->id}}">{{$module->module_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>EC</label>
                            <input type="number" name="ec" class="form-control" required value="{{ old('name')}}">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Toets aanmaken">
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

@endsection
