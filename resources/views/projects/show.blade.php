@extends('layouts.app')

@section('content')
    <div class="col-md-10 col-lg-10">
        <div class="jumbotron col-12">
            <div class="container">
                <h1 class="display-3">{{ $project->name }}</h1>
                <p>{{ $project->description }}</p>
                
                <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p> -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-4" style="background:white;">
                <h2>{{ $project->name }}</h2>
                <p>{{ $project->description }}</p>
                <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">View Project »</a></p>
            </div>
            <hr>
        </div>
    </div>

    <div class="col-md-2 col-xl-2 bd-sidebar">                      <div class="sidebar-module">
            <h4>Actions</h4>
            <ul class="list-unstyled">
                <li class=""><a href="/projects/{{ $project->id }}/edit">Edit</a></li>
                <li class=""><a href="/projects/create">Create new project</a></li>
                <li class=""><a href="/projects">My  projects</a></li>
                <hr>
                <li class="">
                    <a href="#"
                        onclick="var result = confirm('Are you sure you wish to delete this Project');
                        if(result){
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }"
                    >Delete</a>

                    {!! Form::open(['route' => ['projects.update', $project->id], 'id' => 'delete-form']) !!}
                    <!-- <form id="delete-form" action="{{ route('projects.destroy', [$project->id]) }}"> -->
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                    <!-- </form> -->
                    {!! Form::close() !!}
                </li>
                <!-- <li class=""><a href="#">Add new User</a></li> -->
            </ul>
        </div>

        <!-- <div class="sidebar-module">
            <h4>Memmber</h4>
            <ul class="list-unstyled">
                <li class=""><a href="#">1</a></li>
            </ul>
        </div> -->

    </div>
@endsection