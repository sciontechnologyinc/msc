<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Logtrail extends Model
{
    use SoftDeletes;
    protected $table = 'logtrails';
    protected $fillable = [
        'fetcher',
        'status',
        'rfids',
        'time',
        'date',
    ];
}
