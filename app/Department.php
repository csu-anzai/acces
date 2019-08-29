<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "departments";

    protected $fillable = [
        'name'
    ];

    public function school()
    {
        return $this->belongsTo('App\School');
    }
}
