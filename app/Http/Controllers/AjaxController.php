<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getDepartments(Request $request){
        $id = $request->input('id');
        
        $departments = DB::table('departments')
            ->where('school_id', $id)
            ->get();

        return response()->json(array('departments'=> $departments), 200);
     }
}
