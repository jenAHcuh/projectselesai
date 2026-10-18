
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalibrasi Eye Tracking</title>
    <script src="webgazer.js" type="text/javascript"></script>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            color: #222;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 100px auto;
            padding: 30px;
        }

        button {
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            background: #99020A;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        #status {
            margin: 25px 0;
        }
    </style>
</head>

<body>
    <main class="container">
        <h1>Kalibrasi Eye Tracking</h1>

        <p>
            Pastikan wajah terlihat jelas oleh webcam
            dan duduk menghadap layar.
        </p>

        <p id="status">
            Klik tombol di bawah untuk memulai eye tracking.
        </p>

        <button id="start-button" type="button">
            Mulai Eye Tracking
        </button>
    </main>



<script>
    const startButton = document.getElementById('start-button');
    const statusText = document.getElementById('status');

    startButton.addEventListener('click', async function () {
        startButton.disabled = true;
        statusText.textContent = 'Mengaktifkan kamera dan mendeteksi wajah...';

        try {
            const webgazer = window.webgazer;

            if (!webgazer) {
                throw new Error('WebGazer tidak berhasil dimuat dari CDN.');
            }
            
            // Daftarkan listener sebelum memulai WebGazer
            webgazer.setGazeListener(function (data, elapsedTime) {
                if (data) {
                    console.log('Gaze:', {
                        x: data.x,
                        y: data.y,
                        timestamp: elapsedTime
                    });
                }
            }).begin();

            webgazer.setRegression("ridge");

            // Tampilkan elemen visual WebGazer
            webgazer.showVideoPreview(true);
            webgazer.showFaceOverlay(true);
            webgazer.showFaceFeedbackBox(true);
            webgazer.showPredictionPoints(true);

            statusText.textContent =
                'WebGazer aktif. Periksa preview webcam dan deteksi wajah.';

        } catch (error) {
            console.error('WebGazer error:', error);

            statusText.textContent =
                'WebGazer gagal berjalan: ' + error.message;

            startButton.disabled = false;
        }
    });
</script>


</body>
</html>

