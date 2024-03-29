<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = "organizations";

    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
