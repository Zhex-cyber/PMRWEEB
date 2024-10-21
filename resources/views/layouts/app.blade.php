<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Absensi</title>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .navbar {
            background: linear-gradient(45deg, #ff1900, #ff1100);
            padding: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }


        .navbar a {
            color: #fff;
            font-weight: 500;
            text-decoration: none;
            padding: 0 15px;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 15px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px 0;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .btn-lg {
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 50px;
            background: linear-gradient(45deg, #ff416c, #ff4b2b);
            color: white;
            border: none;
            transition: background 0.3s ease;
            cursor: pointer;
        }

        .btn-lg:hover {
            background: linear-gradient(45deg, #ff4b2b, #ff416c);
            box-shadow: 0 4px 15px rgba(255, 75, 43, 0.5);
        }

        footer {
            background-color: #2f2f2f;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 40px;
        }

        footer a {
            color: #ff4b2b;
            text-decoration: none;
            font-weight: 500;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 0 10px;
            }

            .btn-lg {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <p>© 2024 Absensi SMKN 1 Kawali. All Rights Reserved. | <a href="#">Privacy Policy</a></p>
    </footer>

    <!-- Custom Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
