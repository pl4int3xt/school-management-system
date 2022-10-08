@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Update Announcement') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/announcements_update/'.$announcement->id) }}" method="post">
                        @csrf
                        @method("put")
                        <label for="description" class="form-label">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" required="True" value="{{ $announcement->description }}">

                        <label for="department" class="form-label">Department:</label>
                        <select id="department" class="form-select" name="department" required="False" selected="{{ $announcement->department }}">
                            <option value="admin">Admin</option>
                            <option value="teacher">Teacher</option>
                            <option value="guardian">Guardian</option>
                            <option value="finance">finance</option>
                            <option value="librarian">librarian</option>
                        </select>

                        <br>
                        <div class="modal-footer">
                            <div class="container">
                                <a href="{{ url('announcements_index') }}" class="btn btn-outline-primary rounded-pill">
                                    <i class="fa-solid fa-times"></i>
                                </a>
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
@endsection