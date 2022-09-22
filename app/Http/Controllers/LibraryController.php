<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isLibrarian']);
    }
    
    public function index(){
        $libraries = Library::Paginate(20);

        return view('libraries.index', compact('libraries'));
    }

    public function store(){
        $library = new Library();

        request()->validate([
            'book_name'=>'required',
            'student_name'=>'required',
            'student_adm_no'=>'required',
            'day_borrowed'=>'required',
            'return_date'=>'required',
            'returned'=>'required',
        ]);

        $library->book_name = request('book_name');
        $library->student_name = request('student_name');
        $library->student_adm_no = request('student_adm_no');
        $library->day_borrowed = request('day_borrowed');
        $library->return_date = request('return_date');
        $library->returned = request('returned');

        $library->save();

        return redirect('/libraries_index')->with('mssg','details created successfully');
    }

    public function update($id){
        $library = Library::findOrFail($id);

        request()->validate([
            'book_name'=>'required',
            'student_name'=>'required',
            'student_adm_no'=>'required',
            'day_borrowed'=>'required',
            'return_date'=>'required',
            'returned'=>'required',
        ]);
        
        $library->book_name = request('book_name');
        $library->student_name = request('student_name');
        $library->student_adm_no = request('student_adm_no');
        $library->day_borrowed = request('day_borrowed');
        $library->return_date = request('return_date');
        $library->returned = request('returned');

        $library->update();

        return redirect('/libraries_index')->with('mssg','details updated successfully');
    }

    public function destroy($id){
        $library = Library::findOrFail($id);

        $library->delete();

        return redirect('/libraries_index')->with('mssg','details deleted successfully');
    }

    public function edit($id){
        $library = Library::findOrFail($id);

        return view('libraries.edit', compact('library'));
    }

    public function search(){
        $search = request('search');

        if($search){
            $libraries = Library::where('book_name','LIKE',"%{$search}%")->paginate(20);
        }else{
            $libraries = Library::paginate(20);
        }

        return view('libraries.index', compact('libraries'));
    }
}
