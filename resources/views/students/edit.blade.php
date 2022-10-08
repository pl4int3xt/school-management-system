@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Update Student') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/students_update/'.$student->id) }}" method="post">
                        @csrf
                        @method("put")
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $student->name }}">

                        <label for="adm_no" class="form-label">Adm No:</label>
                        <input type="text" class="form-control" id="adm_no" name="adm_no" required="True" value="{{ $student->adm_no }}">

                        <label for="date_of_birth" class="form-label">Date of birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required="True" value="{{ $student->date_of_birth }}">

                        <label for="parent" class="form-label">parent:</label>
                        <input type="text" class="form-control" id="parent" name="parent" required="True" value="{{ $student->parent }}">

                        <label for="dormitory" class="form-label">Dormitory:</label>
                        <select id="dormitory" class="form-select" name="dormitory">
                            @foreach($dormitories as $dormitory)
                                    <option value="{{ $dormitory->name }}" {{ $dormitory->name  == $student->dormitory ? 'selected' : ''}}>{{ $dormitory->name }}</option>        
                            @endforeach                           
                        </select>

                        <label for="class" class="form-label">Class:</label>
                        <select id="class" class="form-select" name="class" required="True">

                        @foreach($clases as $clas)
                                <option value="{{ $clas->name }}" {{ $clas->name == $student->class ? 'selected' : ''}}>{{ $clas->name }}</option>        
                        @endforeach
                                            
                        </select>

                        <br>
                        
                        <div class="modal-footer">
                            <div class="container">
                                <a href="{{ url('students_index') }}" class="btn btn-outline-primary rounded-pill">
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