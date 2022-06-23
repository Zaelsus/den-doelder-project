<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Note extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Gets the order related to the note
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

//    public function setFixLogContent()
//    {
//        $fixLog = Note::where('note_rel', $note->id);
//        dd($fixlog);
//    }
}
