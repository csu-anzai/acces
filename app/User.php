<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname',
        'contact', 'username', 
        'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function insertOrUpdate(Request $request)
    {
        $department = \App\Department::find($request->input('department_id'));
        $organization = \App\Organization::find($request->input('organization_id'));
        $designation = \App\Designation::find($request->input('designation_id'));

        $this->fill($request->all());
        $this->department()->associate($department);
        $this->organization()->associate($organization);
        $this->designation()->associate($designation);
        
        if($request->has('password')){
            $this->password = Hash::make($request->input('password'));
        }

        $this->save();

        return $this;
    }

    public function proposals()
    {
        return $this->hasMany('App\Proposal');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function designation()
    {
        return $this->belongsTo('App\Designation');
    }

    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }
}
