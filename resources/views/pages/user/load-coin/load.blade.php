<!-- resources/views/rotate-icon.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotating Icon with Countdown and Circular Loader</title>
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .rotating {
            animation: rotate 5s linear infinite;
            width: 100px;
            height: 100px; 
            position: relative;
            margin-top: 10px;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Tampilan hitungan mundur */
        #countdown {
            font-size: 24px;
            margin-top: 10px;
        }

        /* Tampilan garis loader */
        .loader-wrapper {
            width: 100px; /* Lebar garis loader */
            height: 100px; /* Tinggi garis loader */
            position: relative;
            margin-top: 10px;
        }

        .loader {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            clip: rect(0px, 50px, 100px, 0px); /* Mengatur area yang terlihat untuk melingkari garis loader */
            animation: fillLoader 10s linear; /* Ubah '10s' menjadi durasi hitungan mundur yang diinginkan */
        }

        @keyframes fillLoader {
            0% {
                transform: rotate(0deg);
                clip: rect(0px, 50px, 100px, 0px);
            }
            50% {
                transform: rotate(180deg);
                clip: rect(0px, 100px, 100px, 0px);
            }
            100% {
                transform: rotate(360deg);
                clip: rect(0px, 100px, 100px, 0px);
            }
        }
    </style>
</head>
<body>
    <div>
        <!-- Icon yang akan diputar -->
        <div class="">
            <i id="rotatingIcon" class="fas fa-circle rotating"></i>
        </div>
        
        <!-- Hitungan mundur -->
        <div id="countdown">Sisa waktu: <span id="countdownValue"></span> detik</div>
        <!-- Garis Loader -->
        <div class="loader-wrapper">
            <div class="loader" id="loader"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var countdownTime = 5;

            // Fungsi untuk mengatur dan menampilkan hitungan mundur
            function startCountdown() {
                var countdownElement = document.getElementById('countdownValue');
                var timer = setInterval(function() {
                    countdownElement.textContent = countdownTime;
                    countdownTime--;

                    // Hentikan hitungan mundur jika waktu habis
                    if (countdownTime < 0) {
                        clearInterval(timer);
                        countdownElement.textContent = 'anda mendapat 1 poin';
                    }
                }, 1000); // Update setiap 1 detik
            }

            // Panggil fungsi hitungan mundur saat halaman dimuat
            startCountdown();
        });
    </script>
</body>
</html>
