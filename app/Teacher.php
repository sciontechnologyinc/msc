<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
        use SoftDeletes;
	protected $table="teachers";
	protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'gender',
        'birthday',
        'department',
        'address',
        'contact'
	];

}
