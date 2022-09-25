<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class AllBookController extends Controller
{
    public function index(){
        $books = Book::Paginate(20);

        return view('all_books.index', compact('books'));
    }

    public function update($id){
        $book = Book::findOrFail($id);

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

        $book->update();

        return redirect('/all_books_index')->with('mssg','details updated successfully');
    }

    public function destroy($id){
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect('/all_books_index')->with('mssg','details deleted successfully');
    }

    public function edit($id){
        $book = Book::findOrFail($id);

        return view('all_books.edit', compact('book'));
    }
}
