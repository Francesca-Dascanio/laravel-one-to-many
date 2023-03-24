@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
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
            Single Project
        </h1>

        @include('partials.success')
        
        <div class="project">
            <div class="card text-center">
                <div class="card-header">
                    {{ $project->title }}
                </div>
                <div class="card-body">
                    @if ($project->img)
                        <img class="card-img-top" src="{{ asset('storage/'.$project->img) }}" alt="Image">
                    @endif
                    <h5 class="card-title">
                        {{ $project->slug }}
                    </h5>
                    <p class="card-text">
                        {{ $project->description }}
                    </p>
                </div>
                <div class="card-footer text-muted">
                    {{ $project->year }}
                </div>
              </div>
        </div>
    </div>
</div>
@endsection