<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Fee;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isFinance']);
    }

    public function index(){
        $students = Student::paginate(20);

        return view('fees.index', compact('students'));
    }

    public function store(){
        $fee = new Fee();

        request()->validate([
            'name'=>'required',
            'fee_paid'=>'required',
            'fee_payable'=>'required',
            'payment_method'=>'required',
            'ref_no'=>'required',
            'term_period'=>'required',
        ]);

        $fee->name = request('name');
        $fee->fee_paid = request('fee_paid');
        $fee->fee_payable = request('fee_payable');
        $fee->payment_method = request('payment_method');
        $fee->ref_no = request("ref_no");
        $fee->term_period = request('term_period');
        

        $fee->save();

        return redirect('/fees_index')->with('mssg','fee added successfully');
    }

    public function search(){
        $students = Student::paginate(20);
        $search = request('search');

        if($search){
            $students = Student::where('name','LIKE',"%{$search}%")->paginate(20);
        }else{
            $students = Student::paginate(20);
        }

        return view('fees.index', compact('students'));
    }
}
