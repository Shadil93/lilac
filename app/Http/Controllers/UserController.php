<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    //
  
    public function index(Request $request){

        $query = DB::table('users')
        ->join('departments', 'users.fk_department', '=', 'departments.id')
        ->join('designations', 'users.fk_designation', '=', 'designations.id')
        ->select('users.*', 'departments.name as department', 'designations.name as designation');
    if ($request->has('search')) {
        $query->where('users.name', 'like', '%' . $request->search . '%')
              ->orWhere('departments.name', 'like', '%' . $request->search . '%');
    }

    $users = $query->orderBy('users.name')->get();
   
        $data=  User::with(['department', 'designation'])->get();
        return view('create.index',compact('data'));

        return response()->json($users);
    }
    public function search(){
        return view('search');
    }
    public function do_search(Request $request){
        $search = $request->input('search');
        $data = User::where('name','like','%' .$search. '%')
        ->orwhere('departments','like','%'.$search .'%');

        $data=  User::with(['department', 'designation'])->get();
        return view('create.index',compact('data'));
    }
    public function inde(Request $request)
    {
        // $query = User::query();

        // if ($request->name) {
        //     $query->where('name', 'LIKE', '%' . $request->name . '%');
        // }
        // if ($request->department) {
        //     $query->whereHas('department', function ($q) use ($request) {
        //         $q->where('name', 'LIKE', '%' . $request->department . '%');
        //     });
        // }

        // $users = $query->with('department', 'designation')->get();

        // return response()->json($users);




    }
 
    
  

}
