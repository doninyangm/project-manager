@extends('layouts.app')

@section('content')

<div class="col-md-6 col-lg-6">
    <div class="">
        <ul class="list-group">
            <li class="list-group-item active">Projects <a class="pull-right btn btn-primary" href="/projects/create">Add Project</a></li>
            @foreach($projects as $project)
                <li class="list-group-item"><a href="/projects/{{ $project->id}}">{{ $project->name }} </a></li>

            @endforeach
        </ul>
    </div>
</div>
@endsection