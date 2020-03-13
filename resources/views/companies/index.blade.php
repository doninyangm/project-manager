@extends('layouts.app')

@section('content')

<div class="col-md-6 col-lg-6">
    <div class="">
        <ul class="list-group">
            <li class="list-group-item active">Companies <a class="pull-right btn btn-primary" href="/companies/create">Add Company</a></li>
            @foreach($companies as $company)
                <li class="list-group-item"><a href="/companies/{{ $company->id}}">{{ $company->name }} </a></li>

            @endforeach
        </ul>
    </div>
</div>
@endsection