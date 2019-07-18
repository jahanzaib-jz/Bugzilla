<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    //
     protected $fillable = [
        'title', 'description', 'deadline','path','type','status','user','qa_id','developer_id','project_id'
    ];
}
