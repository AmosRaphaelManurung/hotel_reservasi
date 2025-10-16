@extends('layouts.app')

@section('title', 'Form Booking Hotel')

@section('content')
<h1>Form Booking Hotel</h1>
<p style="color: #666; margin-bottom: 30px;">Silakan isi form di bawah ini untuk melakukan pemesanan kamar hotel.</p>

<form action="{{ route('bookings.store') }}" method="POST" id="bookingForm">
    @csrf
    
    <div class="form-group">
        <label for="guest_name">Nama Tamu *</label>
        <input type="text" 
               id="guest_name" 
               name="guest_name" 
               value="{{ old('guest_name') }}" 
               required
               placeholder="Masukkan nama lengkap">
        @error('guest_name')
            <span class="error-text">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="check_in">Tanggal Check-In *</label>
        <input type="date" 
               id="check_in" 
               name="check_in" 
               value="{{ old('check_in') }}" 
               required
               min="{{ date('Y-m-d') }}">
        @error('check_in')
            <span class="error-text">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="check_out">Tanggal Check-Out *</label>
        <input type="date" 
               id="check_out" 
               name="check_out" 
               value="{{ old('check_out') }}" 
               required
               min="{{ date('Y-m-d', strtotime('+1 day')) }}">
        @error('check_out')
            <span class="error-text">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="room_type">Tipe Kamar *</label>
        <select id="room_type" name="room_type" required>
            <option value="">-- Pilih Tipe Kamar --</option>
            @foreach($roomTypes as $type)
                <option value="{{ $type }}" {{ old('room_type') == $type ? 'selected' : '' }}>
                    {{ $type }}
                </option>
            @endforeach
        </select>
        @error('room_type')
            <span class="error-text">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="guest_count">Jumlah Tamu *</label>
        <input type="number" 
               id="guest_count" 
               name="guest_count" 
               value="{{ old('guest_count', 1) }}" 
               min="1" 
               max="10"
               required
               placeholder="Jumlah tamu">
        @error('guest_count')
            <span class="error-text">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="room_id">Pilih Kamar (Opsional)</label>
        <select id="room_id" name="room_id">
            <option value="">-- Pilih Kamar Spesifik (Opsional) --</option>
            @foreach($rooms as $room)
                <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                    {{ $room->name }} - {{ $room->type }} (Rp {{ number_format($room->price, 0, ',', '.') }})
                </option>
            @endforeach
        </select>
        @error('room_id')
            <span class="error-text">{{ $message }}</span>
        @enderror
    </div>

    <div style="margin-top: 30px;">
        <button type="submit" class="btn">Buat Booking</button>
        <a href="{{ route('bookings.list') }}" class="btn btn-secondary" style="margin-left: 10px; text-decoration: none; display: inline-block;">Lihat Daftar Booking</a>
    </div>
</form>
@endsection

@section('scripts')
<script>
    
    document.getElementById('check_in').addEventListener('change', function() {
        const checkInDate = new Date(this.value);
        const checkOutInput = document.getElementById('check_out');
        
        
        checkInDate.setDate(checkInDate.getDate() + 1);
        const minCheckOut = checkInDate.toISOString().split('T')[0];
        checkOutInput.min = minCheckOut;
        
        
        if (checkOutInput.value && checkOutInput.value <= this.value) {
            checkOutInput.value = minCheckOut;
        }
    });

     
    document.getElementById('bookingForm').addEventListener('submit', function(e) {
        const formData = {
            guest_name: document.getElementById('guest_name').value,
            check_in: document.getElementById('check_in').value,
            check_out: document.getElementById('check_out').value,
            room_type: document.getElementById('room_type').value,
            guest_count: document.getElementById('guest_count').value,
            room_id: document.getElementById('room_id').value,
            created_at: new Date().toISOString()
        };

        
        let bookings = JSON.parse(localStorage.getItem('hotelBookings') || '[]');
        
        
        bookings.push(formData);
        
        
        localStorage.setItem('hotelBookings', JSON.stringify(bookings));
    });
</script>
@endsection
