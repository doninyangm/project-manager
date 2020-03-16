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

        <div class="row container-fluid">
            {!! Form::open(['route' => ['comments.store']]) !!}
                {{ csrf_field() }}

                <input type="hidden" name="commentable_type" value="App\Project">
                <input type="hidden" name="commentable_id" value="{{$project->id}}">


                <div class="form-group">
                    <label for="comment-content">Comment</label>
                    <textarea placeholder="Enter comment" 
                        style="resize: vertical" 
                        id="comment-content"
                        name="body"
                        rows="3" spellcheck="false"
                        class="form-control autosize-target text-left">
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="comment-content">Proof of work done (Url/Photos)</label>
                    <textarea placeholder="Enter url or screenshots" 
                        style="resize: vertical" 
                        id="comment-content"
                        name="url"
                        rows="2" spellcheck="false"
                        class="form-control autosize-target text-left">
                    </textarea>
                </div>


                    <div class="form-group">
                        <input type="submit" name="" value="Submit" class="btn btn-primary">
                    </div>
            {!! Form::close() !!}
            <hr>
        </div>

        @foreach($project->comments as $comment)
            <div class="col-lg-4 col-md-4 col-sm-4">
                <h2>{{ $comment->body }}</h2>
                <p class="text-damger">{{$comment->url}}</p>
                <p><a class="btn btn-primary" href="/projects/{{$project->id}}" role="button">View Project</a></p>
            </div>
        @endforeach
        
    </div>

    <div class="col-md-2 col-xl-2 bd-sidebar">
        <div class="sidebar-module">
            <h4>Actions</h4>
            <ul class="list-unstyled">
                <li class=""><a href="/projects/{{ $project->id }}/edit">Edit</a></li>
                <li class=""><a href="/projects/create">Create new project</a></li>
                <li class=""><a href="/projects">My  projects</a></li>
                <hr>

                @if($project->user_id == Auth::user()->id)
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
                @endif
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