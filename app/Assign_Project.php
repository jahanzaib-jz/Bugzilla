<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assign_Project extends Model
{
    //
    protected $fillable = [
        'developer_id','project_id','manager_id'
    ];
    /**
     * Assign_Project belongs to Projects.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function projects()
    {
    	// belongsTo(RelatedModel, foreignKey = projects_id, keyOnRelatedModel = id)
    	return $this->belongsTo('App\Project','project_id');
    }
}
