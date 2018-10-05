<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logtrail extends Model
{
    protected $table = 'logtrails';
    protected $fillable = [
        'fetcher',
        'status',
        'section',
        'student',
        'time',
        'date',
    ];
}
