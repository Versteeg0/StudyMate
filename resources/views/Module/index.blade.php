@extends('layouts.app')

@section('content')
    <div class="container no-max-width">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <a href="{{ route('module.createpage') }}" class="btn btn-danger">
                    Module Toevoegen
                </a>

                <table class="table table-dark">
                    <p/>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Naam</th>
                        <th>Omschrijving</th>
                        <th>Categorie</th>
                        <th>Coordinator</th>
                        <th>Leraar</th>
                        <th>Periode</th>
                        <th>EC</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($aModules as $oModule)
                        <tr>
                            <td>{{$oModule->id}}</td>
                            <td>{{$oModule->module_name}}</td>
                            <td>{{$oModule->module_description}}</td>
                            <td>{{$oModule->module_category}}</td>
                            <td>{{$oModule->coordinator}}</td>
                            <td>{{$oModule->is_my_teacher}}</td>
                            <td>{{$oModule->module_period}}</td>
                            <td>{{$oModule->module_ec}}</td>
                                <td>
                                    <a href="{{ route('module.edit', $oModule->id) }}" class="btn btn-primary">Bewerk</a>
                                </td>
                                <td>
                                    <a href="{{ route('module.delete', $oModule->id) }}" class="btn btn-danger">Verwijder</a>
                                </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
