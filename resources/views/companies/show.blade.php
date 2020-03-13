@extends('layouts.app')

@section('content')
    <div class="col-md-10 col-lg-10">
        <div class="jumbotron col-12">
            <div class="container">
                <h1 class="display-3">{{ $company->name }}</h1>
                <p>{{ $company->description }}</p>
                
                <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p> -->
            </div>
        </div>

        <div class="row">
            @foreach($company->projects as $project)
            <div class="col-md-4" style="background:white;">
                <h2>{{ $project->name }}</h2>
                <p>{{ $project->description }}</p>
                <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">View Project »</a></p>
            </div>
            @endforeach
            <hr>
        </div>
    </div>

    <div class="col-md-2 col-xl-2 bd-sidebar">                      <div class="sidebar-module">
            <h4>Actions</h4>
            <ul class="list-unstyled">
                <li class=""><a href="/companies/{{ $company->id }}/edit">Edit</a></li>
                <li class=""><a href="/projects/create/{{ $company->id }}">Add Project</a></li>
                <li class=""><a href="/companies">My  Companies</a></li>
                <li class=""><a href="/companies/create">Add Company</a></li>

                <hr>
                <li class="">
                    <a href="#"
                        onclick="var result = confirm('Are you sure you wish to delete this Project');
                        if(result){
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }"
                    >Delete</a>

                    {!! Form::open(['route' => ['companies.update', $company->id], 'id' => 'delete-form']) !!}
                    <!-- <form id="delete-form" action="{{ route('companies.destroy', [$company->id]) }}"> -->
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