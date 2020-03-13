@extends('layouts.app')

@section('content')
    <div class="col-md-10 col-lg-10">

        <div class="row col-12">
            {!! Form::open(['route' => ['projects.store']]) !!}
            {{ csrf_field() }}

                <div class="form-group">
                    <label for="project-name">Project name <span class="required">*</span></label>
                    <input type="text" class="form-control" name="name" id="project-name" value="" placeholder="Enter project name" required >
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows="6" cols="20" name="description" id="description" placeholder="Enter project description"></textarea>
                </div>

                @if($companies != null)
                    <div class="form-group">
                        <label for="companies">Select company</label>
                        <select name="company_id" id="companies">
                            @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                @if($companies == null)
                <input type="hidden" name="company_id" value="{{ $company_id }}" >
                @endif
                <div class="form-group">
                    <input type="submit" name="" value="Submit" class="btn btn-primary">
                </div>
            {!! Form::close() !!}
            <hr>
        </div>
    </div>

    <div class="col-md-2 col-xl-2 bd-sidebar">
        <div class="sidebar-module">
            <h4>Actions</h4>
            <ul class="list-unstyled">
                <li class=""><a href="/projects/">All Projects</a></li>
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