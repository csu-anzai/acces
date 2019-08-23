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

     public function insertProposal(Request $request){
        $json = $request->input('json');
        DB::table('proposals')->insert([
            'title' => $request->input('title'),
            'CES_type' => $request->input('CEStype'),
            'start_date' => $request->input('startDate'),
            'end_date' => $request->input('endDate'),
            'venue' => $request->input('venue'),
            'proposal_json' => $json
       ]);
        return response()->json($json, 200);
    }
}
