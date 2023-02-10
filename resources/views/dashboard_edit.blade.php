@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit project</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <a class="btn btn-primary" href="{{route('dashboard.index')}}" role="button">Go back</a>
                    <form class="d-flex" action="{{route('dashboard.update', $project->id)}}" method="POST">
                        @csrf
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Project name</label>
                                <input type="text" name="name" id="" class="form-control" value="{{$project->name}}" aria-describedby="helpId" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">description</label>
                                <textarea name="description" id="" class="form-control" aria-describedby="helpId">{{$project->description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Main Image (URL)</label>
                                <input type="url" name="main_image" id="" class="form-control" value="{{$project->main_image}}" placeholder="https://example.com" pattern="https://.*" required>
                            </div>
                            {{-- come faccio a mettere la data nel value ?????????? --}}
                            <div class="mb-3">
                                <label for="" class="form-label">Realease date</label>
                                <input type="date" name="release_date" id="" class="form-control" value="{{$project->release_date}}" aria-describedby="helpId" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Repo link (URL)</label>
                                <input type="url" name="repo_link" id="" class="form-control" value="{{$project->repo_link}}" placeholder="https://example.com" pattern="https://.*" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
