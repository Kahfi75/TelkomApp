<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visit Telkom</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        header {
            background-color: #0061a8;
            color: white;
            padding: 10px 20px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 1.5em;
        }

        .navbar-menu {
            display: none;
        }

        .navbar-menu ul {
            list-style: none;
            padding: 0;
        }

        .navbar-menu ul li {
            display: inline-block;
            margin-left: 20px;
        }

        .navbar-menu ul li a {
            color: white;
            text-decoration: none;
            font-size: 1em;
        }

        /* Hero Section */
        .hero {
            background-color: #0061a8;
            color: white;
            text-align: center;
            padding: 100px 20px;
        }

        .hero-content h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .cta-button {
            background-color: #ff0000;
            color: white;
            padding: 10px 20px;
            border: none;
            font-size: 1.2em;
            cursor: pointer;
        }

        /* Cards Section */
        .cards-section {
            padding: 40px 20px;
        }

        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: white;
            border: 1px solid #e0e0e0;
            padding: 20px;
            text-align: center;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .card-button {
            background-color: #0061a8;
            color: white;
            padding: 10px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
            border-radius: 5px;
        }

        .card-button:hover {
            background-color: #ff0000;
        }

        /* Responsive Navbar */
        .navbar-toggle {
            background: none;
            border: none;
            color: white;
            font-size: 2em;
            cursor: pointer;
        }

        @media (min-width: 768px) {
            .navbar-menu {
                display: block;
            }

            .navbar-toggle {
                display: none;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <!-- Navbar -->
    <header>
        <nav id="navbar" class="navbar">
            <div class="navbar-brand">Visit Telkom</div>
            <div class="navbar-menu" id="navbar-menu">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <button class="navbar-toggle" id="navbar-toggle">&#9776;</button>
        </nav>
    </header>

    <!-- Main Content -->
    <section class="hero">
    <div class="hero-content">
        <h1>Welcome to Visit Telkom</h1>
        <p>Your trusted partner in providing visit solutions for healthcare facilities.</p>
        <a href="{{ route('visit.index') }}" class="cta-button">Explore Categories</a> 
    </div>
</section>



    <!-- Cards Section -->
    <section class="cards-section">
        <div class="cards-container">
            <div class="card">
                <h3>Apotek</h3>
                <p>Kunjungi apotek terdekat.</p>
                <a href="apotek.html" class="card-button">Explore</a>
            </div>
            <div class="card">
                <h3>Rumah Sakit</h3>
                <p>Cari rumah sakit di sekitar Anda.</p>
                <a href="rumah-sakit.html" class="card-button">Explore</a>
            </div>
            <div class="card">
                <h3>Puskesmas</h3>
                <p>Kunjungi puskesmas untuk perawatan dasar.</p>
                <a href="puskesmas.html" class="card-button">Explore</a>
            </div>
            <div class="card">
                <h3>Klinik</h3>
                <p>Temukan klinik untuk konsultasi cepat.</p>
                <a href="klinik.html" class="card-button">Explore</a>
            </div>
            <div class="card">
                <h3>Toko</h3>
                <p>Kunjungi toko-toko dengan layanan kesehatan.</p>
                <a href="toko.html" class="card-button">Explore</a>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('navbar-toggle').addEventListener('click', function() {
            var navbarMenu = document.getElementById('navbar-menu');
            if (navbarMenu.style.display === 'block') {
                navbarMenu.style.display = 'none';
            } else {
                navbarMenu.style.display = 'block';
            }
        });
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
