<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;

class BookingController extends Controller
{
    // Menampilkan form booking
    public function index()
    {
        $rooms = Room::where('is_available', true)->get();
        $roomTypes = Room::select('type')->distinct()->pluck('type');
        return view('bookings.index', compact('rooms', 'roomTypes'));
    }

    // Menyimpan booking baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'guest_name' => 'required|string|max:255',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'room_type' => 'required|string',
            'guest_count' => 'required|integer|min:1',
            'room_id' => 'nullable|exists:rooms,id'
        ]);

        $booking = Booking::create($validated);

        return redirect()->route('bookings.list')
            ->with('success', 'Booking berhasil dibuat!');
    }

    // Menampilkan daftar semua booking
    public function list(Request $request)
    {
        $query = Booking::with('room');

        // Filter berdasarkan tipe kamar jika ada
        if ($request->has('room_type') && $request->room_type != '') {
            $query->where('room_type', $request->room_type);
        }

        $bookings = $query->orderBy('created_at', 'desc')->get();
        $roomTypes = Room::select('type')->distinct()->pluck('type');

        return view('bookings.list', compact('bookings', 'roomTypes'));
    }

    // API untuk mendapatkan data booking (untuk localStorage)
    public function getBookings()
    {
        $bookings = Booking::with('room')->orderBy('created_at', 'desc')->get();
        return response()->json($bookings);
    }
}
