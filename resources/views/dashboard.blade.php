@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a class="btn btn-primary" href="{{route('dashboard.create')}}" role="button">Add project</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Project name </th>
                                <th scope="col">Description</th>
                                <th scope="col">Main image</th>
                                <th scope="col">Release date</th>
                                <th scope="col">Repo link</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{$project->id}}</th>
                                <td>{{$project->name}}</td>
                                <td>{{$project->description}}</td>
                                <td><a href="{{$project->main_image}}">{{$project->main_image}}</a></td>
                                <td>{{$project->release_date}}</td>
                                <td><a href="{{$project->repo_link}}">{{$project->repo_link}}</a></td>
                                <td>
                                    {{-- se volessi passare piu parametri?  usando questo non va ['id'=>$project->id]--}}
                                    <form class="form-inline"action="{{ route('dashboard.destroy', $project->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-success" href="{{route('dashboard.edit', $project->id)}}" role="button">Edit</a>
                                        <a class="btn btn-primary" href="{{route('projects.show', $project->id)}}" role="button">Preview</a>
                                        <input class="btn btn-outline-danger" type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                         </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
