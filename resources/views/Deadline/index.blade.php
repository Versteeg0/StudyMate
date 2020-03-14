@extends('layouts.app')
<link href="{{ asset('css/deadlinemanager.css') }}" rel="stylesheet">

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="header">
                    <h4>Welkom bij de Deadline Manager</h4>
                </div>
                 <form class="form" action="{{route('deadline.sort')}}" method="post">
                     @csrf
                     <div class="form-group">
                         <select name="sortName">
                             <option value="Docent">Docent</option>
                             <option value="Module">Module</option>
                             <option value="Deadline">Deadline</option>
                             <option value="Tag">Tag</option>
                         </select>

                        <input type="submit" value="Sorteren" class="btn btn-primary">
                    </div>
                </form>

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
                                        <br>
                                    @endforeach
                                @else
                                    Geen tags ingesteld
                                @endif
                            </td>
                            <td>
                                <div class="form-group">
                                    @if($module->isChecked == 1)
                                        <input type="checkbox"  disabled checked>
                                    @else
                                        <input name="checkbox" type="checkbox" disabled>
                                    @endif
                                </div>
                            </td>
                            <td><a href="{{ route('deadline.details', $module->id) }}" class="btn btn-primary">Bekijk</a></td>
                            <td><a href="{{ route('deadline.editPage', $module->id) }}" class="btn btn-secondary">Bewerk</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
