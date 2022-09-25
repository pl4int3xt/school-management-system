<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Student;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isLibrarian']);
    }
    
    public function index(){
        $students = Student::Paginate(20);

        return view('books.index', compact('students'));
    }

    public function store(){
        $book = new Book();

        request()->validate([
            'book_name'=>'required',
            'student_name'=>'required',
            'student_adm_no'=>'required',
            'day_borrowed'=>'required',
            'return_date'=>'required',
            'returned'=>'required',
        ]);

        $book->book_name = request('book_name');
        $book->student_name = request('student_name');
        $book->student_adm_no = request('student_adm_no');
        $book->day_borrowed = request('day_borrowed');
        $book->return_date = request('return_date');
        $book->returned = request('returned');

        $book->save();

        return redirect('/books_index')->with('mssg','details created successfully');
    }

    public function search(){
        $search = request('search');

        if($search){
            $students = Student::where('name','LIKE',"%{$search}%")->paginate(20);
        }else{
            $students = Student::paginate(20);
        }

        return view('books.index', compact('students'));
    }
}
