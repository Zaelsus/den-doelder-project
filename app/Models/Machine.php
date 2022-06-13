<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    /**
     * returns the users related to the machine
     */
    public function users()
    {
        return $this->hasMany(User::class, 'machine_id');
    }

    /**
     *Gets the orders related to the machine
     */
    public function orders()
    {
        return $this->hasMany(Order::class,'machine_id');
    }
}
