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
                             <option value="Categorie">Categorie</option>
                         </select>

                        <input type="submit" value="Sorteren" class="btn btn-primary">
                    </div>
                </form>
                <table class="table table-dark">
                    <thead>
                        <th>Toets</th>
                        <th>Module</th>
                        <th >Docent</th>
                        <th >Deadline</th>
                        <th >Categorie</th>
                        <th >EC</th>
                        <th>Tags</th>
                        <th>Afgerond</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($aAssignments as $assignment)
                            <tr>
                                <td>{{$assignment->name}}</td>
                                <td>{{$assignment->module->module_name}}</td>
                                <td>@if($assignment->module->teacher_id != null){{$assignment->module->teacher->first_name}}@endif</td>
                                @if($assignment->deadline == null)
                                    <td>Deadline niet gezet</td>
                                @else
                                    <td>{{date('d-m-Y', strtotime($assignment->deadline))}}</td>
                                @endif
                                <td>{{$assignment->module->module_category}}</td>
                                <td>{{$assignment->ec}}</td>
                                <td>
                                    @if(count($assignment->tags) > 0)
                                        @foreach($assignment->tags as $tag)
                                            {{$tag->tag_name}}
                                            <br>
                                        @endforeach
                                    @else
                                        Geen tags ingesteld
                                    @endif
                                </td>
                                <td>
                                    <div class="form-group">
                                        @if($assignment->isChecked == true)
                                            <input type="checkbox"  disabled checked>
                                        @else
                                            <input name="checkbox" type="checkbox" disabled>
                                        @endif
                                    </div>
                                </td>
                                <td><a href="{{ route('deadline.details', $assignment->id) }}" class="btn btn-primary">Bekijk</a></td>
                                <td><a href="{{ route('deadline.editPage', $assignment->id) }}" class="btn btn-secondary">Bewerk</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
