@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div> --}}
        <h1 class="my-3">
            Projects
        </h1>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-success my-3 ms-2" style="width: auto">
            New Project
        </a>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Year</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">
                            {{ $project->id }}
                        </th>
                        <td>
                            {{ $project->title }}
                        </td>
                        <td>
                            {{ $project->slug }}
                        </td>
                        <td>
                            {{ $project->year }}
                        </td>
                        <td>
                            <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection