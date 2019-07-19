<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    //
     protected $fillable = [
        'title', 'description', 'deadline','path','type','status','user','qa_id','developer_id','project_id'
    ];
    /**
     * Bug belongs to .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function qa()
    {
    	// belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
    	return $this->belongsTo('App\User','qa_id');
    }
    /**
     * Bug belongs to .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
    	// belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
    	return $this->belongsTo('App\Project','project_id');
    }
    /**
     * Bug belongs to .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function  developer()
    {
    	// belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
    	return $this->belongsTo('App\User','developer_id');
    }
}
