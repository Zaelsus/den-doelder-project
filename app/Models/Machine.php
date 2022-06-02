<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    /**
     * returns the hourly reports related to the order
     */
    public function users()
    {
        return $this->hasMany(User::class, 'machine_id');
    }
}
