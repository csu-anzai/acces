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

     public function createProposal(Request $request){
       $proposal = new \App\Proposal;
       $user = \App\User::find($request->input('creator_id'));

       $proposal->fill($request->all());
       $proposal->creator()->associate($user);
       $proposal->save();
       
        return response()->json($proposal->id, 200);
    }

    public function submitProposal(Request $request){
        $proposal = \App\Proposal::find($request->input('id'));
        $proposal->status = $request->input('proposal_status');
        $proposal->save();

        $process = ($proposal->process()->exists())? $proposal->process() : new \App\Process ;
        $process->status = $request->input('process_status');
        $process->proposal()->associate($proposal);
        $process->save();

        $history = $process->history;

        if(is_null($history)){
            $history = [];
            $history['submitted_by'] = [];
            $history['submitted_at'] = [];
        }
        $process->history = $history;

        $process->updateProcess($request->input('submitted_by'), $request->input('process_status'));

        return response("Submit Successful", 200);        
    }

    public function updateProcess(Request $request){
        $proposal = \App\Proposal::find($request->input('proposal_id'));
        $process  = $proposal->process;

        $process->updateProcess($request->input('submitted_by'), $request->input('status'));

        return response("Update Successful", 200);
    }

    public function getProposal(Request $request){
        $id = $request->input('id');
        $proposal = DB::table('proposals')
            ->where('id', $request->input('id'))
            ->first();

        return response()->json($proposal, 200);
    }

    public function getProposalDataForReview(Request $request){
        $id = $request->input('id');
        $proposal = DB::table('proposals')
            ->join('users', 'users.id', 'proposals.creator_id')
            ->join('departments', 'departments.id', 'users.department_id')
            ->join('schools', 'schools.id', 'departments.school_id')
            ->where('proposals.id', $request->input('id'))
            ->select('title', 'schools.name as school', 'departments.name as department', 'start_date', 'end_date')
            ->first();

        return response()->json($proposal, 200);
    }

    public function getReviewCommittee(Request $request){
        $users = DB::table('users')
            ->join('departments', 'departments.id', 'users.department_id')
            ->join('schools', 'schools.id', 'departments.school_id')
            ->where('designation_id', 7)
            ->select('firstname', 'lastname', 'schools.name as school_name', 'schools.id as school_id')
            ->get();

        return response()->json($users, 200);
    }
}
