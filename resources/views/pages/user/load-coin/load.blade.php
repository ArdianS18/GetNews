<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotating Icon with Countdown and Circular Loader</title>
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Container utama untuk semua elemen */
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        /* Kontainer untuk gambar dan loader */
        .rotating-container {
            position: relative;
            width: 100px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Animasi garis berputar */
        .rotating-line {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 60px;
            height: 60px;
            border-top: 5px solid #3498db; /* Warna garis */
            border-radius: 50%; /* Membuat garis menjadi lingkaran */
            transform-origin: center;
            animation: rotateLine 60s linear infinite; /* Animasi rotasi */
            /* z-index: 2; */
        }

        /* Keyframes untuk animasi garis berputar */
        @keyframes rotateLine {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }
            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        .image {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%; /* Ensure the container fills the height */
        }

        /* Teks hitungan mundur */
        #countdown {
            position: absolute;
            font-size: 24px;
            color: white; /* Sesuaikan warna teks agar terlihat */
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Kontainer untuk gambar dan loader -->
        <div class="rotating-container">
            <!-- Garis yang berputar -->
            <div class="rotating-line"></div>
            <!-- Gambar -->
            <div class="image">
                <img src="{{asset('assets/img/coin-load.svg')}}" width="60" alt="Gambar">
            </div>
            <div id="countdown"><span id="countdownValue"></span></div>
        </div>
    </div>

    <!-- Script untuk mengatur hitungan mundur -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var countdownTime = 60;

            function startCountdown() {
                var countdownElement = document.getElementById('countdownValue');
                var timer = setInterval(function() {
                    countdownTime--;

                    if (countdownTime < 0) {
                        clearInterval(timer);
                        countdownElement.textContent = '1';
                    }
                }, 1000);
            }

            startCountdown();
        });
    </script>
</body>
</html>
