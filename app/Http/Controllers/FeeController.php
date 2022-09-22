<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isFinance']);
    }

    public function index(){
        $fees = Fee::Paginate(20);

        return view('fees.index', compact('fees'));
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

    public function update($id){
        $fee = Fee::findOrFail($id);

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

        $fee->update();

        return redirect('/fees_index')->with('mssg','fee updated successfully');
    }

    public function destroy($id){
        $fee = Fee::findOrFail($id);

        $fee->delete();

        return redirect('/fees_index')->with('mssg','fee deleted successfully');
    }

    public function edit($id){
        $fee = Fee::findOrFail($id);

        return view('fees.edit', compact('fee'));
    }

    public function search(){
        $search = request('search');

        if($search){
            $fees = Fee::where('name','LIKE',"%{$search}%")->paginate(20);
        }else{
            $fees = Fee::paginate(20);
        }

        return view('fees.index', compact('fees'));
    }
}
