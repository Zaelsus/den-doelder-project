<?php

namespace App\Providers;

use App\Models\Note;
use App\Providers\NotePriorityChange;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PriorityErrorNote
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\NotePriorityChange  $event
     * @return void
     */
    public function handle(NotePriorityChange $event)
    {
        $note = $event->note;

        if($note->fix === 'Error!') {
            $note->update(['priority' => 'high']);
        }
        if($note->note_rel !== null) {
            Note::where('id', $note->note_rel)->update(['priority' => 'low']);
        }
    }
}
