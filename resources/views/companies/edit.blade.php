@extends('layouts.app')

@section('content')
    <div class="col-md-10 col-lg-10">

        <div class="row col-12">
            {!! Form::open(['route' => ['companies.update', $company->id]]) !!}
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">

                <div class="form-group">
                    <label for="company-name">Company name <span class="required">*</span></label>
                    <input type="text" class="form-control" name="name" id="company-name" value="{{ $company->name }}" placeholder="Enter company name" required >
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows="6" cols="20" name="description" id="description" placeholder="Enter company description">{{ $company->description }}</textarea>
                </div>

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
                <li class=""><a href="/companies/{{ $company->id }}">View company</a></li>
                <li class=""><a href="/companies/">All Companies</a></li>
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