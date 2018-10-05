<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fetcher extends Model
{
    protected $table="fetchers";
	protected $fillable = [
        'name',
        'gender',
        'birthday',
        'rfidno',
        'status',
        'address',
        'contact'
	];
}
