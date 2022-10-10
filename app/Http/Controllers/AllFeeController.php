<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;

class AllFeeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isFinance']);
    }

    public function index(){
        $fees = Fee::paginate(20);

        return view('all_fees.index', compact('fees'));
    }

    public function destroy($id){
        $fees = Fee::findOrFail($id);

        $fees->delete();

        return redirect('/all_fees_index')->with('mssg','clas deleted successfully');
    }

    public function edit($id){
        $fee = Fee::findOrFail($id);

        return view('all_fees.edit', compact('fee'));
    }

    public function update($id){
        $fee = Fee::findOrFail($id);

        $fee->name = request('name');
        $fee->fee_paid = request('fee_paid');
        $fee->fee_payable = request('fee_payable');
        $fee->payment_method = request('payment_method');
        $fee->ref_no = request("ref_no");
        $fee->term_period = request('term_period');
        
        $fee->update();
        return redirect('/all_fees_index')->with('mssg','fee edited successfully');
    }

    public function search(){
        $search = request('search');

        if($search){
            $fees = Fee::where('name','LIKE',"%{$search}%")->paginate(20);
        }else{
            $fees = Fee::paginate(20);
        }

        return view('all_fees.index', compact('fees'));
    }
}
