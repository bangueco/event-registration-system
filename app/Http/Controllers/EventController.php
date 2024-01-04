<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function createEvent(Request $r)
    {
        Event::create([
            'event_name' => $r['event_name'],
            'event_by' => Auth::user()->username,
            'venue' => $r['venue'],
            'starting_on' => $r['starting_on'],
        ]);

        return redirect()->back();
    }

    public function joinEvent(Request $r)
    {
        $user = Auth::user()->username;
        $event = Event::where('_id', $r['id']);
        $matched = false;

        foreach ($event->get()[0]->participants as $participant) {
            if (strcmp($participant, $user) == 0) {
                $matched = true;
            }
        }

        if ($matched) {
            return 'You already joined this event!';
        }
        $event->push('participants', $user);
        return 'Successfully joined event!';
    }
}
