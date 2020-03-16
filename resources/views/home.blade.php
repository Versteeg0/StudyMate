@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach($aPeriods as $aPeriod)
                <div class="card">
                    <div class="card-header">Periode {{$aPeriod}}</div>

                    <div class="card-body">
                        Dit is periode {{$aPeriod}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
