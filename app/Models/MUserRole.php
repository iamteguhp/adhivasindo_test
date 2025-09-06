<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MUserRole extends Model
{   
    use SoftDeletes;
    protected $table = "user_roles";
    protected $primaryKey = "id";

    protected $fillable = [
        'name',
    ];

}
