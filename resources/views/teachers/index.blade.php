@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">{{ __('Teachers') }}</div>

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
                                        <a href="#" class="btn btn-outline-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#teacher-reg-modal">
                                            <i class="fa-solid fa-add"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col text-end">
                                    <form action="{{ route('teachers.search') }}" method="get">
                                        <input class="form-control" type="text" name="search" placeholder="search here ....."><br>
                                        <button type="submit" class="btn btn-outline-primary rounded-pill">
                                            <i class="fa-solid fa-search"></i>
                                        </button> 
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
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Class</th>
                                        <th>Subjects</th>
                                        <th>Is Class Teacher</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $teacher) 
                                        <tr>
                                            <td>{{ $teacher->name }}</td>
                                            <td>{{ $teacher->contact }}</td>
                                            <td>{{ $teacher->class }}</td>
                                            <td>{{ $teacher->subjects }}</td>
                                            <td>{{ $teacher->is_class_teacher }}</td>
                                            <td>
                                                <a href="{{ url('/teachers_edit/'.$teacher->id) }}" class="btn btn-outline-primary rounded-pill">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="{{ url('/teachers_destroy/'.$teacher->id)}}"class="btn btn-outline-primary rounded-pill">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $teachers->onEachSide(1)->links() }}
                        </div>
                        <!-- registration modal -->

                        <div class="modal fade" id="teacher-reg-modal" aria-labelledby="modal-title" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Teachers registration</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('teachers.store') }}" method="post">
                                            @csrf
                                            <label for="name" class="form-label">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name" required="True">

                                            <label for="contact" class="form-label">Contact:</label>
                                            <input type="tel" class="form-control" id="contact" name="contact" required="True">

                                            <label for="subjects" class="form-label">Subjects:</label>
                                            <input type="text" class="form-control" id="subjects" name="subjects" required="True">


                                            <label for="is_class_teacher" class="form-label">Is Class Teacher:</label>
                                            <select id="is_class_teacher" class="form-select" name="is_class_teacher" required="False">
                                                <option value="true">True</option>
                                                <option value="false">False</option>
                                            </select>

                                            <label for="class" class="form-label">Class:</label>
                                            <select id="class" class="form-select" name="class" required="True">

                                            <option hidden disabled selected> select class ....</option>
                
                                            @foreach($clases as $clas)
                                                    <option value="{{ $clas->name }}">{{ $clas->name }}</option>        
                                            @endforeach
                                                                
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