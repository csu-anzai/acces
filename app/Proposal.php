<?php

namespace App;

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
        return $this->belongsTo('App\User', 'user_id');
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
}
