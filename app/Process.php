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
}
