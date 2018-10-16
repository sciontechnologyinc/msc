<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fetcher extends Model
{
    use SoftDeletes;
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
