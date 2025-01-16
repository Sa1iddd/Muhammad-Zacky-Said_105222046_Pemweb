<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorEmpat {

	public function getJson () {

		// mengambil seluruh data eveent
        $events = Event::all();

        $eventsData = $events->map(function ($event) {
            $color = ($event->user_id == Auth::id()) ? 'purple' : 'gray';
            
            return [
                'id' => $event->id,
                'title' => $event->name . ' - ' . $event->user->name,  
                'start' => $event->start,
                'end' => $event->end,
                'color' => $color,  
            ];
        });

        return response()->json($eventsData);
	}
}

?>