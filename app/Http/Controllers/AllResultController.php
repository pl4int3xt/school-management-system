<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Result;
use DB;
use PDF;
use Illuminate\Http\Request;

class AllResultController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isTeacher']);
    }

    public function index(){
        $teachers = Teacher::All();  
        $subjects = Subject::All();
        $results = Result::orderBy('total','desc')->paginate(20);

        return view('all_results.index', compact('subjects','teachers','results'));
    }

    public function update($id, Request $request){
        $result = new Result();

        request()->validate([
            'position'=>'required',
        ]);
        

        $id = $request->id;
        $position = $request->position;
   
        for($i=0; $i<count($id);$i++){

            $data = [
                'position'=>$position[$i],
            ];

            DB::table('results')->where('id', $id[$i])->update($data);
        }

        return redirect('/all_results_index')->with('mssg','result submitted successfully');
    }


    public function destroy($id){
        $result = Result::findOrFail($id);

        $result->delete();

        return redirect('/all_results_index')->with('mssg','result deleted successfully');
    }

    public function search(){
        $teachers = Teacher::All();
        $subjects = Subject::All();
        $search = request('search');

        if($search){
            $results = Result::where('term_period','LIKE',"%{$search}%")->orderBy('total','desc')->paginate(20);
        }else{
            $results = Result::paginate(20);
        }

        return view('all_results.index', compact('results','subjects','teachers'));
    }

    public function generatepdf(){

        $search = request('search');
        
        $teachers = Teacher::All();
        $subjects = Subject::All();

        $results = Result::where('term_period','LIKE',"%{$search}%")->orderBy('total','desc')->get();
        
        $pdf = PDF::loadView('all_results_pdf.index', compact('results','teachers','subjects'))->setPaper('a4','landscape');

        return $pdf->download('all_results.pdf');
    }
}
