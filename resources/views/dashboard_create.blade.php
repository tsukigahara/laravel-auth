@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add new project</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a class="btn btn-primary" href="{{route('dashboard.index')}}" role="button">Go back</a>
                    <form class="d-flex" action="{{route('dashboard.store')}}" method="POST">
                        @csrf
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Project name</label>
                                <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">description</label>
                                <textarea name="description" id="" class="form-control" placeholder="" aria-describedby="helpId"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Main Image (URL)</label>
                                <input type="url" name="main_image" id="" class="form-control" placeholder="https://example.com" pattern="https://.*" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Realease date</label>
                                <input type="date" name="release_date" id="" class="form-control" placeholder="" aria-describedby="helpId" min="0" max="250" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Repo link (URL)</label>
                                <input type="url" name="repo_link" id="" class="form-control" placeholder="https://example.com" pattern="https://.*" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add</button>
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