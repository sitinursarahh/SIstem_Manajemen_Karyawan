<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambil Lokasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        #latitude, #longitude {
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ambil Lokasi</h1>
        <button id="get-location">Ambil Lokasi</button>
        <div>
            <label for="latitude">Latitude:</label>
            <input type="text" id="latitude" readonly>
        </div>
        <div>
            <label for="longitude">Longitude:</label>
            <input type="text" id="longitude" readonly>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('get-location').addEventListener('click', function() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        document.getElementById('latitude').value = position.coords.latitude;
                        document.getElementById('longitude').value = position.coords.longitude;
                    }, function(error) {
                        console.error("Error Code = " + error.code + " - " + error.message);
                    });
                } else {
                    console.error("Geolocation is not supported by this browser.");
                }
            });
        });
    </script>
</body>
</html>
