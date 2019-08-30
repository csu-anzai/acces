<?php

namespace App\Http\Controllers;

use DB;
use App\Proposal;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getDepartments(Request $request){
        $id = $request->input('id');

        $school = \App\School::find($id);

        $departments = $school->departments;

        return response()->json(array('departments'=> $departments), 200);
     }

     public function insertProposal(Request $request){
       $proposal = new \App\Proposal;
       $user = \App\User::find($request->input('creator_id'));

       $proposal->fill($request->all());
       $proposal->creator()->associate($user);
       $proposal->save();
       
        return response()->json($proposal->id, 200);
    }

    public function updateProposal(Request $request){
        $proposal = \App\Proposal::find($request->input('id'));
        $proposal->status = $request->input('proposal_status');
        $proposal->save();

        $process = ($proposal->process()->exists())? $proposal->process() : new \App\Process ;
        $process->status = $request->input('process_status');
        $process->proposal()->associate($proposal);
        $process->save();

        $history = [];
        $history['submitted_by'] = $request->input('submitted_by');
        $history['submitted_at'] = (string)$process->updated_at;
        $json = json_encode($history);

        if(is_null($process->history) == false){
            //Not Sure if this line will work
            $json = $process->history + ", " + $json;
        }

        $process->history = $json;
        $process->save();

        return response("Update Successful", 200);
    }

    public function getProposal(Request $request){
        $id = $request->input('id');
        $proposal = DB::table('proposals')
            ->where('id', $request->input('id'))
            ->first();

        return response()->json($proposal, 200);
    }
}
