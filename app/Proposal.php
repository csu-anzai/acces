<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $table = "proposals";

    protected $fillable = [
        'title', 'CES_type', 'start_date', 'end_date',
        'venue', 'proposal_json_A', 'proposal_json_B',
        'status'
    ];

    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function process()
    {
        return $this->hasOne('App\Process');
    }

    public function reviewer_one()
    {
        return $this->belongsTo('App\User');
    }

    public function reviewer_two()
    {
        return $this->belongsTo('App\User');
    }

    public static function getProposalByStatus($status){
        $temp = DB::table('proposals')
            ->join('processes', 'processes.proposal_id', '=', 'proposals.id')
            ->where([
                ['proposals.status', 'Pending'],
                ['processes.status', $status]
            ])
            ->select('proposals.id as id')
            ->get();

        $proposals = collect();
        foreach($temp as $proposal){
           $proposals->push(\App\Proposal::find($proposal->id));
        }

        return $proposals;
    }

    public static function getProposalBy($bySchool, $id, $status)
    {
        if($bySchool){
            $temp = DB::table('proposals')
                ->join('processes', 'processes.proposal_id', '=', 'proposals.id')
                ->join('users', 'users.id', '=', 'proposals.creator_id')
                ->join('departments', 'departments.id', '=', 'users.department_id')
                ->where([
                ['proposals.status', 'Pending'],
                ['processes.status', $status],
                ['school_id', $id]
                ])
                ->select('proposals.id as id')
                ->get();
        }else{
            $temp = DB::table('proposals')
                ->join('users', 'users.id', '=', 'proposals.creator_id')
                ->join('processes', 'processes.proposal_id', '=', 'proposals.id')
                ->where([
                    ['proposals.status', 'Pending'],
                    ['processes.status', $status],
                    ['department_id', $id]
                ])
                ->select('proposals.id as id')
                ->get();
        }

        $proposals = collect();
        foreach($temp as $proposal){
           $proposals->push(\App\Proposal::find($proposal->id));
        }

        return $proposals;
    }
}
