<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class MenProduct extends Model
{
    protected $fillable = [
        'custom-image',
        'title',
        'size',
        'notes',
    ];
}
