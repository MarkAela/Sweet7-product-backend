<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $primaryKey = 'seller_id';

    protected $fillable = [
        'seller_name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
