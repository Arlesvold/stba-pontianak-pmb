<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('tanggal_mulai', 'desc')
            ->paginate(9); // 3x3 grid looks nice

        return view('pmb.events.index', compact('events'));
    }

    public function show(Event $event)
    {
        // If you need a detail page later
        // return view('pmb.events.show', compact('event'));
    }
}
