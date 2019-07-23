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
    	// public function assignedProjects(){
    	// 	/**
    	// 	 * Project has many .
    	// 	 *
    	// 	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
    	// 	 */
    		
    		
    	// 		// hasMany(RelatedModel, foreignKeyOnRelatedModel = project_id, localKey = id)
    	// 		return $this->hasMany('App\Assign_Project');
    		
    	// }
    	public function projects()
    {
        
        return $this->belongsToMany('App\User','assign__projects');
    }
    	public function developer()
    {
        return $this->belongsToMany('App\User','assign__projects','developer_id');
    }
    }

