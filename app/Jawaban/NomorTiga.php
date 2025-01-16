<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorTiga {

	public function getData () {
		// Tuliskan code mengambil semua data jadwal user, simpan di variabel $data 
		$data = Event::where('user_id', Auth::id())->get();
		return $data;
	}

	public function getSelectedData (Request $request) {

		$id = $request->query('id');
    	$data = Event::where('id', $id)->where('user_id', Auth::id())->first();

    	if (!$data) {
        	return response()->json(['error' => 'Event tidak ditemukan.'], 404);
    	}

    	return response()->json($data);
	}

	public function update(Request $request)
	{
		$validated = $request->validate([
			'id' => 'required|exists:events,id',
			'name' => 'required|string|max:255',
			'start' => 'required|date',
			'end' => 'required|date',
		]);
	
		$event = Event::findOrFail($validated['id']);
		$event->update([
			'name' => $validated['name'],
			'start' => $validated['start'],
			'end' => $validated['end'],
		]);
	
		return redirect()->route('event.home')->with('message', 'Event berhasil diperbarui');
	}
	
	public function delete (Request $request) {
		$validated = $request->validate([
			'id' => 'required|exists:events,id',
		]);
	
		$event = Event::findOrFail($validated['id']);
		$event->delete();
	
		return redirect()->route('event.home')->with('message', 'Event berhasil dihapus');
	}
}

?>