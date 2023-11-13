@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row mt-5 text-white">
            <div class="col-6">
                <div>
                    <label for="title" class="form-label">title</label>
                    <input name="title" class=" form-control  @error('title') is-invalid @enderror" type="text"
                        placeholder="new title" value="{{ $project->title }}">


                    @if ($errors->get('title'))
                        <label for="title" class="form-label">
                            @foreach ($errors->get('title') as $error)
                                <small class="text-danger">{{ $error }}</small>
                            @endforeach
                        </label>
                    @endif
                </div>

                <div>
                    <label for="project_link" class="form-label mt-2">project_link</label>
                    <input name="project_link" class="form-control  @error('project_link') is-invalid @enderror"
                        type="text" placeholder="new project_link" value="{{ $project->project_link }}">

                    @if ($errors->get('project_link'))
                        <label for="project_link" class="form-label">
                            @foreach ($errors->get('project_link') as $error)
                                <small class="text-danger">{{ $error }}</small>
                            @endforeach
                        </label>
                    @endif
                </div>

                <div>
                    <label for="github_link" class="form-label mt-2">github_link</label>
                    <input name="github_link" class="form-control  @error('github_link') is-invalid @enderror"
                        type="text" placeholder="new github_link" value="{{ $project->github_link }}">

                    @if ($errors->get('github_link'))
                        <label for="github_link" class="form-label">
                            @foreach ($errors->get('github_link') as $error)
                                <small class="text-danger">{{ $error }}</small>
                            @endforeach
                        </label>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="type_id" class="form-label">Categories</label>
                    <select class="form-select @error('type_id') is-invalid  @enderror" name="type_id" id="type_id">

                        <option selected disabled>Select a category</option>
                        <option value="">Uncategorized</option>

                        @forelse ($types as $type)
                            <option value="{{ $type->id }}" {{ $type->id == old($type->id) ? selected : '' }}
                                class="form-select @error('type_id') is-invalid @enderror">
                                {{ $type->name }}</option>
                        @empty
                        @endforelse


                    </select>
                </div>

                <div>
                    <label for="thumb" class="form-label mt-2">thumb</label>
                    <input name="thumb" class="form-control  @error('thumb') is-invalid @enderror" type="file">

                    @if ($errors->get('thumb'))
                        <label for="thumb" class="form-label">
                            @foreach ($errors->get('thumb') as $error)
                                <small class="text-danger">{{ $error }}</small>
                            @endforeach
                        </label>
                    @endif
                </div>

                <div>
                    <label for="description" class="form-label mt-2">description</label>
                    <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="description"
                        cols="30" rows="10">{{ $project->description }}</textarea>

                    @if ($errors->get('description'))
                        <label for="description" class="form-label">
                            @foreach ($errors->get('description') as $error)
                                <small class="text-danger">{{ $error }}</small>
                            @endforeach
                        </label>
                    @endif
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </div>

            <div class="col-6">

                <h2>title: <a href="{{ $project->project_link }}">{{ $project->title }}</a> #{{ $project->id }}</h2>
                <h3>slug: {{ $project->slug }}</h3>
                <img class="img-fluid" src="{{ $project->thumb }}" alt="">
                <p>{{ $project->description }}</p>
            </div>
        </div>
    </form>
@endsection
