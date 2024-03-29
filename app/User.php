<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type'
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
   
    public function userprojects()
    {
        
        return $this->belongsToMany('App\Project','assign__projects','developer_id');
    }
    public function developerProjects()
    {
        
        return $this->belongsTo('App\Assign_Project','developer_id');
    }
        
        public function isManager()
    
    {
   
            if($this->type=='manager'){
                return true;
            }
       
       // return redirect()->route('home');
            return false;
    }
      public function isDeveloper()
    {
   
            if($this->type=='developer'){
                return true;
            }
       
       return false;
    }
      public function isQA()
    {
   
            if($this->type=='qa'){
                return true;
            }
       
       return false;
    }
    public function getId()
{
  return $this->id;
}
}
