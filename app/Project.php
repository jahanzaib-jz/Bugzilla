<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
     protected $fillable = [
        'title', 'description','manager_id'
    ];
    public function manager(){
    	
    		return $this->belongsTo('App\User','manager_id');
    	}
    }

