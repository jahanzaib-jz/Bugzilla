<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assign_Project extends Model
{
    //
    protected $fillable = [
        'developer_id','project_id','manager_id'
    ];
}
