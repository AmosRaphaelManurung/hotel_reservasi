<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hotel Reservation System')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h1, h2, h3 {
            color: #333;
            margin-bottom: 20px;
        }

        .navbar {
            background: #2c3e50;
            color: white;
            padding: 15px 0;
            margin-bottom: 30px;
            border-radius: 5px;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 3px;
            transition: background 0.3s;
        }

        .navbar a:hover {
            background: #34495e;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #3498db;
        }

        .btn {
            background: #3498db;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        .btn:hover {
            background: #2980b9;
        }

        .btn-secondary {
            background: #95a5a6;
        }

        .btn-secondary:hover {
            background: #7f8c8d;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background: #3498db;
            color: white;
            font-weight: bold;
        }

        table tr:hover {
            background: #f5f5f5;
        }

        .filter-section {
            background: #ecf0f1;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .error-text {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
    @yield('styles')
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="{{ route('bookings.index') }}">Buat Booking</a></li>
            <li><a href="{{ route('bookings.list') }}">Daftar Booking</a></li>
        </ul>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <ul style="margin-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>

    @yield('scripts')
</body>
</html>
