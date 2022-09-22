<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isAdmin']);
    }
    
    public function index(){
        $users = User::paginate(20);

        return view('admin.index', compact('users'));
    }

    public function store(){

        request()->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required',
        ]);

        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->role = request('role');
        $user->save();

        return redirect('/admin_index')->with('mssg', 'user registered successfuly');  
    }

    public function edit($id){
        $user = User::findOrFail($id);

        return view('admin.edit', compact('user'));

    }

    public function update($id){
        
        request()->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required',
        ]);

        $user = User::findOrFail($id);
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->role = request('role');
        $user->update();

        return redirect('/admin_index')->with('mssg', 'user updated successfully');

    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/admin_index')->with('mssg','user deleted successfully');

    }

    public function search(){
        $search = request('search');
        if($search){
            $users = User::where('name', 'LIKE', "%{$search}%")->paginate(20);
        }else{
            $users = User::paginate(20);
        }

        return view('admin.index', compact('users'));
    }
}
