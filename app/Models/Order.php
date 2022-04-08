<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $attributes = [
        'status' => 'pending',
        'location' => 'Axel',
        'material'=>'HT/KD 1000x100x22 BC (1000x100x22)',
        'instructions' =>'',

    ];
    protected $fillable = [
        'delivery_status',
        'delivered_by',
    ];

    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Note::class);
    }
}
