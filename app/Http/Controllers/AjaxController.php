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
        $id = DB::table('proposals')->insertGetId([
            'title' => $request->input('title'),
            'CES_type' => $request->input('CEStype'),
            'start_date' => $request->input('startDate'),
            'end_date' => $request->input('endDate'),
            'venue' => $request->input('venue'),
            'status' => $request->input('status'),
            'proposal_json_A' => $request->input('json_A'),
            'proposal_json_B' => $request->input('json_B'),
            'user_id' => $request->input('userId')
       ]);
       
        return response()->json($id, 200);
    }

    public function getProposal(Request $request){
        $id = $request->input('id');
        $proposal = DB::table('proposals')
            ->where('id', $request->input('id'))
            ->first();

        return response()->json($proposal, 200);
    }
}
