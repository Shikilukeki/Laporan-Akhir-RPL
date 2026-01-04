<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SpeedTest RPL</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="app">
    <div class="left">

        <!-- SPEEDOMETER -->
        <div class="speedometer">

            <!-- LENGKUNGAN -->
            <div class="arc"></div>

            <!-- SKALA -->
            <div class="scale s0">0</div>
            <div class="scale s50" id="scaleMid">50</div>
            <div class="scale s100" id="scaleMax">100</div>

            <!-- JARUM -->
            <div class="needle" id="needle"></div>

            <!-- NILAI -->
            <div class="speed-value">
                <span id="download">0.00</span>
                <small>Mbps</small>
            </div>
        </div>

        <!-- STATUS -->
        <p id="status" style="margin-top:60px; color:#666;">
            Klik "Mulai Tes" untuk memulai
        </p>

        <button onclick="startTest()">Mulai Tes</button>
        <br><br>
        <a href="history.php" class="muted-link">Lihat Riwayat Tes</a>

    </div>

    <!-- PANEL KANAN -->
    <div class="right">
        <div class="stats-row">
            <div class="stat">
                <h4>📶 PING</h4>
                <p><span id="ping">-</span> <small>ms</small></p>
            </div>
            <div class="stat">
                <h4>⬇️ DOWNLOAD</h4>
                <p><span id="downloadText">-</span> <small>Mbps</small></p>
            </div>
            <div class="stat">
                <h4>⬆️ UPLOAD</h4>
                <p><span id="upload">-</span> <small>Mbps</small></p>
            </div>
        </div>

        <div class="info">
            <p>🌐 Server: Jakarta, ID</p>
            <p>💻 Client: Tangerang, ID</p>
        </div>
    </div>
</div>

<script src="assets/js/script.js"></script>
</body>
</html>
