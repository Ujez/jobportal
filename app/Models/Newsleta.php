<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsleta extends Model
{
    use SoftDeletes;
    protected $fillable = [ //this was copied from the usermodel
        'email',
    ];
}
