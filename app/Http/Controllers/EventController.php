<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function createEvent(Request $r)
    {
        var_dump($r['starting_on']);
        Event::create([
            'event_name' => $r['event_name'],
            'event_by' => Auth::user()->username,
            'venue' => $r['venue'],
            'starting_on' => $r['starting_on'],
        ]);

        return;
    }
}
