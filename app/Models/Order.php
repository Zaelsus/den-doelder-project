<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $attributes = [
        'status' => 'pending',
        'location' => 'Axel',
        'material'=>'HT/KD 1000x100x22 BC (1000x100x22)',
        'instructions' =>null,
    ];
}
