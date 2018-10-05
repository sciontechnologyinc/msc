<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
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
