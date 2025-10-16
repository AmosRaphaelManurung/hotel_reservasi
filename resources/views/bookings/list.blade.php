@extends('layouts.app')

@section('title', 'Daftar Booking Hotel')

@section('content')
<h1>Daftar Booking Hotel</h1>

<!-- Filter Section -->
<div class="filter-section">
    <h3>Filter Booking</h3>
    <form method="GET" action="{{ route('bookings.list') }}" style="display: flex; gap: 15px; align-items: flex-end;">
        <div class="form-group" style="flex: 1; margin-bottom: 0;">
            <label for="room_type">Tipe Kamar</label>
            <select id="room_type" name="room_type" onchange="this.form.submit()">
                <option value="">-- Semua Tipe Kamar --</option>
                @foreach($roomTypes as $type)
                    <option value="{{ $type }}" {{ request('room_type') == $type ? 'selected' : '' }}>
                        {{ $type }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="btn">Filter</button>
            <a href="{{ route('bookings.list') }}" class="btn btn-secondary" style="text-decoration: none;">Reset</a>
        </div>
    </form>
</div>

<!-- Daftar Booking dari Database -->
<h2 style="margin-top: 30px;">Booking dari Database</h2>
@if($bookings->count() > 0)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Tamu</th>
                <th>Check-In</th>
                <th>Check-Out</th>
                <th>Tipe Kamar</th>
                <th>Jumlah Tamu</th>
                <th>Kamar</th>
                <th>Tanggal Booking</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->guest_name }}</td>
                    <td>{{ $booking->check_in->format('d/m/Y') }}</td>
                    <td>{{ $booking->check_out->format('d/m/Y') }}</td>
                    <td>{{ $booking->room_type }}</td>
                    <td>{{ $booking->guest_count }} orang</td>
                    <td>{{ $booking->room ? $booking->room->name : '-' }}</td>
                    <td>{{ $booking->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p style="text-align: center; padding: 40px; color: #999;">
        Belum ada booking yang tersimpan di database.
    </p>
@endif

<!-- Daftar Booking dari localStorage -->
<h2 style="margin-top: 40px;">Booking dari LocalStorage</h2>
<div id="localStorageBookings">
    <p style="text-align: center; padding: 40px; color: #999;">
        Memuat data dari localStorage...
    </p>
</div>

<div style="margin-top: 30px; text-align: center;">
    <a href="{{ route('bookings.index') }}" class="btn">Buat Booking Baru</a>
    <button onclick="clearLocalStorage()" class="btn btn-secondary" style="margin-left: 10px;">Hapus Data LocalStorage</button>
</div>
@endsection

@section('scripts')
<script>
    // Ambil filter tipe kamar yang aktif
    const activeRoomType = "{{ request('room_type') }}";

    // Fungsi untuk menampilkan booking dari localStorage
    function displayLocalStorageBookings() {
        const bookings = JSON.parse(localStorage.getItem('hotelBookings') || '[]');
        const container = document.getElementById('localStorageBookings');
        
        if (bookings.length === 0) {
            container.innerHTML = '<p style="text-align: center; padding: 40px; color: #999;">Belum ada booking yang tersimpan di localStorage.</p>';
            return;
        }

        // Filter booking berdasarkan tipe kamar jika ada filter aktif
        let filteredBookings = bookings;
        if (activeRoomType) {
            filteredBookings = bookings.filter(booking => booking.room_type === activeRoomType);
        }

        if (filteredBookings.length === 0) {
            container.innerHTML = '<p style="text-align: center; padding: 40px; color: #999;">Tidak ada booking dengan tipe kamar "' + activeRoomType + '" di localStorage.</p>';
            return;
        }

        // Buat tabel untuk menampilkan data
        let html = '<table>';
        html += '<thead>';
        html += '<tr>';
        html += '<th>No</th>';
        html += '<th>Nama Tamu</th>';
        html += '<th>Check-In</th>';
        html += '<th>Check-Out</th>';
        html += '<th>Tipe Kamar</th>';
        html += '<th>Jumlah Tamu</th>';
        html += '<th>Tanggal Booking</th>';
        html += '</tr>';
        html += '</thead>';
        html += '<tbody>';

        filteredBookings.forEach((booking, index) => {
            const checkIn = new Date(booking.check_in).toLocaleDateString('id-ID');
            const checkOut = new Date(booking.check_out).toLocaleDateString('id-ID');
            const createdAt = new Date(booking.created_at).toLocaleString('id-ID');

            html += '<tr>';
            html += '<td>' + (index + 1) + '</td>';
            html += '<td>' + booking.guest_name + '</td>';
            html += '<td>' + checkIn + '</td>';
            html += '<td>' + checkOut + '</td>';
            html += '<td>' + booking.room_type + '</td>';
            html += '<td>' + booking.guest_count + ' orang</td>';
            html += '<td>' + createdAt + '</td>';
            html += '</tr>';
        });

        html += '</tbody>';
        html += '</table>';
        
        container.innerHTML = html;
    }

    // Fungsi untuk menghapus data localStorage
    function clearLocalStorage() {
        if (confirm('Apakah Anda yakin ingin menghapus semua data booking dari localStorage?')) {
            localStorage.removeItem('hotelBookings');
            displayLocalStorageBookings();
            alert('Data localStorage berhasil dihapus!');
        }
    }

    // Tampilkan booking saat halaman dimuat
    window.addEventListener('DOMContentLoaded', displayLocalStorageBookings);
</script>
@endsection
