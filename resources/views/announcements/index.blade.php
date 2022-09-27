@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">{{ __('Announcements') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- search form -->
                    <div class="container m-4">
                            <div class="row">
                                <div class="col-8">
                                    <div class="container text-start">
                                        <a href="#" class="btn btn-outline-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#announcement-reg-modal">
                                            <i class="fa-solid fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col text-end">
                                    <form action="{{ route('announcements.search') }}" method="get">
                                        <input class="form-control" type="text" name="search" placeholder="search here ....."><br>
                                        <button type="submit" class="btn btn-outline-primary rounded-pill">Search</button> 
                                    </form>
                                </div>
                            </div>   
                    </div>

                    <div class="container p-0">
                        @if (session('mssg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mssg') }}
                            </div>
                        @endif

                        <!-- members registration table -->
                        <div class="container table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Department</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($announcements as $announcement) 
                                        <tr>
                                            <td>{{ $announcement->description }}</td>
                                            <td>{{ $announcement->department }}</td>
                                            <td>
                                                <a href="{{ url('/announcements_edit/'.$announcement->id) }}" class="btn btn-outline-primary rounded-pill"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ url('/announcements_destroy/'.$announcement->id)}}" class="btn btn-outline-primary rounded-pill"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $announcements->onEachSide(1)->links() }}
                        </div>
                        <!-- registration modal -->

                        <div class="modal fade" id="announcement-reg-modal" aria-labelledby="modal-title" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Announcements Registration</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('announcements.store') }}" method="post">
                                            @csrf
                                            <label for="description" class="form-label">Description:</label>
                                            <input type="text" class="form-control" id="description" name="description" required="True">

                                            <label for="department" class="form-label">Department:</label>
                                            <select id="department" class="form-select" name="department" required="False">
                                                <option value="admin">Admin</option>
                                                <option value="teacher">Teacher</option>
                                                <option value="guardian">Guardian</option>
                                                <option value="finance">finance</option>
                                                <option value="librarian">librarian</option>
                                            </select>

                                            <div class="modal-footer">
                                                <div class="container">
                                                    <button type="submit" class="btn btn-outline-primary rounded-pill">
                                                        <i class="fa-solid fa-paper-plane"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection