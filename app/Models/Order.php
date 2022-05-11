<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $attributes = [
        'start_date'=>null,
        'site_location'=>'Axel',
        'production_instructions'=>'',
        ];
}
