<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorDua {

	public function submit (Request $request) {

		// Tuliskan code untuk menyimpan data Jadwal
		$validated = $request->validate([
        'name' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

	$validated['user_id'] = Auth::id();
	$validated['start'] = $request->input('start_date');
	$validated['end'] = $request->input('end_date');

    // Simpan data ke database (PHPMYADMIN)
    Event::create($validated);
    
    // pesan sukses
    return redirect()->route('event.home')->with('success', 'Jadwal berhasil ditambahkan!');

	}
}

?>