<?php

namespace App\Http\Controllers;

use DB;
use App\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ProposalSent;
use App\User;

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

        event(new \App\Events\ForwardedProposal(Auth::user()->firstname . " " . Auth::user()->lastname, $proposal->creator->id));
        User::find($proposal->creator->id)->notify(new ProposalSent(User::findOrFail(Auth::user()->id)));
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
            ->select('users.id as id', 'firstname', 'lastname', 'schools.name as school_name', 'schools.id as school_id')
            ->get();

        return response()->json($users, 200);
    }

    public function markAsRead(Request $request){
        Auth::user()->unreadNotifications->markAsRead();
        return response("Good!", 200);
    }
    
    public function assignReviewCommittee(Request $request){
        $proposal = \App\Proposal::find($request->input('proposal_id'));
        $reviewer_one = \App\User::find($request->input('reviewer_one_id'));
        $reviewer_two = \App\User::find($request->input('reviewer_two_id'));
        $process = $proposal->process;

        $proposal->reviewer_one()->associate($reviewer_one);
        $proposal->reviewer_two()->associate($reviewer_two);

        $process->updateProcess($request->input('submitted_by'), "On Going Committee Review");

        $proposal->save();

        return response("Assign Successful", 200);
    }

    public function getHistory(Request $request){
        $process = \App\Process::find($request->input('process_id'));

        $json = $process->history;
        $json['designation'] = [];
        $json['school'] = [];

        $result = DB::table('users')
            ->whereIn('users.id', $json['submitted_by'])
            ->select('firstname', 'lastname', 'id')
            ->get();

        $len = count($json['submitted_by']);

        for($x = 0; $x < $len; $x++){
            foreach($result as $temp){
                if($temp->id == $json['submitted_by'][$x]){
                    $user = \App\User::find($temp->id);
                    
                    $json['submitted_by'][$x] = $temp->firstname." ".$temp->lastname;
                    $json['designation'][$x] = $user->designation->name;
                    $json['school'][$x] = $user->department->school->name;

                    break;
                }
            }
        }

        return response()->json($json, 200);
    }
}
