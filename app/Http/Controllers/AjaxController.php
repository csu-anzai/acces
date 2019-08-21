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

     public function test(Request $request){
         $json = $request->input('json');

         DB::table('proposals')->insert([
             'title' => "test",
             'CES_type' => "Activity Based",
             'start_date' => "2019-08-06",
             'end_date' => "2019-08-09",
             'venue' => "test",
             'proposal_json' => $json
        ]);

         return response()->json($json, 200);
     }
}
