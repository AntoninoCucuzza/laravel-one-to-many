    @extends('layouts.admin')


    @section('content')
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Success!</strong> {{ session('message') }}
            </div>
        @endif

        <div class="table-responsive-sm mt-5">
            <div class="d-flex justify-content-between my-4">
                <h1 class="text-center text-white">projects table</h1>
                <a class="btn m-2 btn-dark" href="{{ route('admin.projects.create') }}">
                    <i class="fa-solid fa-pencil" style="color: #ffffff;"></i> new project
                </a>
            </div>

            <table class="table table-dark table-hover align-middle ">
                <thead class="">
                    <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Thumb</th>
                        <th scope="col">link</th>
                        <th scope="col">actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr class="text-center ">

                            <td>{{ $project->id }}</td>

                            <td><a href="{{ $project->github_link }}">{{ $project->title }}</a></td>

                            <td><img width="150" src="{{ $project->thumb }}" alt=""></td>

                            <td><a href="{{ $project->github_link }}"><i class="fa-brands fa-github fa-lg"></i></a> <a
                                    href="{{ $project->project_link }}"><i class="fa-solid fa-link fa-lg"></i></a></td>
                            <td>
                                <a class="btn btn-light" href="{{ route('admin.projects.show', $project->slug) }}">
                                    <i class="fa-solid fa-eye" style="color: #000000;"></i>
                                </a>

                                <a class="btn btn-warning" href=" {{ route('admin.projects.edit', $project->slug) }}">
                                    <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                                </a>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $project->id }}">
                                    <i class="fa-solid fa-trash-can" style="color: #000000;"></i>
                                </button>


                                <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitle-{{ $project->id }}" aria-hidden="true">

                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">

                                        <div class="modal-content">

                                            <div class="modal-header bg-dark">
                                                <h5 class="modal-title" id="modalTitle-{{ $project->id }}">Modal id:
                                                    {{ $project->id }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body bg-dark">
                                                sei sicuro di voler eliminare questo projetto?
                                            </div>

                                            <div class="modal-footer bg-dark">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>


                                                <form class=" d-inline-block bg-dark"
                                                    action="{{ route('admin.projects.destroy', $project->slug) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>

                                            </div>

                                        </div>
                            </td>

                        </tr>
                    @empty
                        <tr class="text-center table-dark">
                            <td colspan="5"> no projects </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>


        </div>
    @endsection
