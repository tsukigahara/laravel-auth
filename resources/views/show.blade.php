@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{$project->name}}</h1>
<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
        <div class="card h-100">
            <img src="{{$project->main_image}}" class="card-img-top" alt="{{$project->name}}">
            <div class="card-body">
                <h5 class="card-title">{{$project->name}}</h5>
                <p class="card-text">{{$project->description}}</p>
                <h6>{{$project->release_date}}</h6>
                <a href="{{$project->repo_link}}" class="btn btn-primary">Go repository</a>
            </div>
        </div>
    </div>
</div>
@endsection
