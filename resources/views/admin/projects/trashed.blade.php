@extends('layouts.admin')

@section('content')
    <h1 class="text-center text-white"> soft-deleted</h1>
    <table class="table table-light table-hover align-middle">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Thumb</th>
                <th scope="col">link</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trashedProjects as $trashedProject)
                <tr class="text-center table-dark">

                    <td>{{ $trashedProject->id }}</td>

                    <td><a href="{{ $trashedProject->github_link }}">{{ $trashedProject->title }}</a></td>

                    <td><img width="150" src="{{ $trashedProject->thumb }}" alt=""></td>

                    <td>
                        <a href="{{ $trashedProject->github_link }}"><i class="fa-brands fa-github fa-lg"></i></a>
                        <a href="{{ $trashedProject->project_link }}"><i class="fa-solid fa-link fa-lg"></i></a>
                    </td>

                    <td>
                        <div class="d-flex justify-content-center gap-1">
                            <form method="POST" action="{{ route('admin.projects.restore', $trashedProject->id) }}">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-danger" type="submit">Ripristina</button>
                            </form>

                            <form method="POST" action="{{ route('admin.projects.forceDelete', $trashedProject->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Elimina definitivamente</button>
                            </form>
                        </div>
                    </td>

                </tr>
            @empty
                <tr class="text-center table-dark">
                    <td colspan="5">
                        <h1>no projects soft-deleted</h1>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
