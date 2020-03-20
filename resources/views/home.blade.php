@extends('layouts.app')

@section('head')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 justify-content-center">
            <h4>Afgeronden modules per periode</h4>
            @foreach($aPeriods as $aPeriod)
                <div class="card">
                    <div class="card-header">Periode {{$aPeriod}} </div>
                    <div class="card-body">
                                <table class="table table-dark">
                                    <p/>
                                    <thead>
                                    <tr>
                                        <th>Naam</th>
                                        <th>Omschrijving</th>
                                        <th>Leraar</th>
                                        <th>Blok</th>
                                        <th>Cijfer</th>
                                        <th>Totale EC</th>
                                        <th>Gekregen EC</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($aModules as $oModule)
                                        @if($oModule->module_period == $aPeriod)
                                            <tr>
                                                <td>{{$oModule->module_name}}</td>
                                                <td>{{$oModule->module_description}}</td>
                                                <td>{{$oModule->teacher->first_name}}</td>
                                                <td>{{$oModule->module_block}}</td>
                                                <td>{{$oModule->getAverageGradeAttribute()}}</td>
                                                <td>{{$oModule->getTotalECAttribute()}}</td>
                                                <td>{{$oModule->getEarnedECAttribute()}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                    Behaalde EC deze periode: {{$aEC[$aPeriod]}}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-12 progressdiv">
            <h2>Progressbar</h2>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{$gainedEC}}"  aria-valuemin="0" aria-valuemax="{{$totalEC}}" style="width:{{$percentageEC}}%">
                    Behaald: {{$gainedEC}} van de {{$totalEC}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
