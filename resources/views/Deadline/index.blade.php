@extends('layouts.app')
<link href="{{ asset('css/deadlinemanager.css') }}" rel="stylesheet">

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="header">
                    <h4>Welkom bij de Deadline Manager</h4>
                </div>
                <form class="form" method="post">

                </form>
                <select name="sortName">

                </select>
                <table class="table table-dark">
                    <thead>
                        <th>Naam</th>
                        <th >Coördinator</th>
                        <th >Deadline</th>
                        <th>Tags</th>
                        <th>Afgerond</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                    @foreach($modules as $module)
                        <tr>
                            <td>{{$module->module_name}}</td>
                            <td>{{$module->coordinator}}</td>
                            @if($module->assignment->deadline == null)
                                <td>Deadline niet gezet</td>
                            @else
                                <td>{{date('d-m-Y', strtotime($module->assignment->deadline))}}</td>
                            @endif
                            <td>
                                @if(count($module->assignment->tags) > 0)
                                    @foreach($module->assignment->tags as $tag)
                                        {{$tag->tag_name}}
                                    @endforeach
                                @else
                                    Geen tags ingesteld
                                @endif
                            </td>
                            <td>
                                @if($module->isChecked == 1)
                                    <input type="checkbox" checked>
                                @else
                                    <input type="checkbox">
                                @endif
                            </td>
                            <td><a href="{{ route('deadline.details', $module->id) }}" class="btn btn-primary">Bekijk</a></td>
                            <td><a href="{{ route('deadline.editPage', $module->id) }}" class="btn btn-secondary">Bewerk</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <form class="form" method="post">
                    {{csrf_field()}}
                 {{--   <a href="{{ route('deadline.checked') }}" class="btn btn-primary">Bewerk</a>--}}
                    <input type="submit" ref="{{ route('deadline.checked') }}" value="Opslaan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection

