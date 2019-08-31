<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $table = "processes";

    protected $fillable = [
        'status', 'history'
    ];

    protected $casts = [
        'history' => 'array'
    ];

    public function proposal()
    {
        return $this->belongsTo('App\Proposal');
    }

    public function updateProcess($submitted_by, $status)
    {
        $this->touch();

        $history = $this->history;

        array_push($history['submitted_by'], $submitted_by);
        array_push($history['submitted_at'], (string)$this->updated_at);

        $this->history = $history;
        $this->status = $status;

        $this->save();
    }

    public function getLatestSubmittedBy(){
        $history = $this->history;
        return end($history['submitted_by']);
    }

    public function getLatestSubmittedAt(){
        $history = $this->history;
        return end($history['submitted_at']);
    }
}
