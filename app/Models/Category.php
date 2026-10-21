<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'categories_id';

    protected $fillable = [
        'categories_name',
        'description',
    ];
}
