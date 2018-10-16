<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes;
    protected $table = 'sections';
    protected $fillable = [
        'grade',
        'section'
    ];
}
