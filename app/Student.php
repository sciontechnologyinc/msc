<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    protected $table="students";
	protected $fillable = [
        'firstname',
        'lastname',
        'gender',
        'birthday',
        'grade',
        'section',
        'schoolyear',
        'contact',
        'fetcher',
        'guardian'
	];
}
