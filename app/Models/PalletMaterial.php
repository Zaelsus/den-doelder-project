<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PalletMaterial extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $attributes = [
        'test' => null,
    ];
    /**
     * Gets the material related to the palletMaterial
     */
    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id','product_id');
    }

    /**
     * Gets the pallet related to the palletMaterial
     */
    public function pallet()
    {
        return $this->belongsTo(Pallet::class, 'pallet_id');
    }
}
