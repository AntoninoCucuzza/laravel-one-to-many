@extends('layouts.admin')

@section('content')
    <div class="container text-white">
        <h1 class="fw-bold text-center mt-3">Project Number: # {{ $project->id }}</h1>
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Success!</strong> {{ session('message') }}
            </div>
        @endif

        <div class="d-flex align-items-center justify-content-between">
            <h4>slug: {{ $project->slug }}</h4>
            <div>
                <a class="btn btn-warning btn-lg me-2 border-dark" href="{{ route('admin.projects.edit', $project->slug) }}">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>

                <a class="btn btn-danger btn-lg me-2 border-dark" href="{{ route('admin.projects.edit', $project->slug) }}">
                    <i class="fa-solid fa-trash-can" style="color: #000000;"></i>
                </a>

            </div>
        </div>

        <h4>online link: <a href="{{ $project->project_link }}">{{ $project->project_link }}</a></h4>
        <h4>github link: <a href="{{ $project->github_link }}">{{ $project->github_link }}</a></h4>

        <h4>Type:
            @if ($project->type)
                {{ $project->type->name ? $project->type->name : 'Uncategorized' }}
            @else
                Uncategorized
            @endif
        </h4>


        <div class="row mt-4">

            <div class="col-6">
                <img class="img-fluid" src="{{ $project->thumb }}" alt="">
            </div>

            <div class="col-6">
                <h1 class="">titolo: {{ $project->title }}</h1>
                <p class="mt-3">descrizione: {{ $project->description }}</p>

            </div>

        </div>

    </div>
@endsection
