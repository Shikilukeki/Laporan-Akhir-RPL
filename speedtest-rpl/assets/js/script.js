// ================= HELPER =================
function setNeedle(speed, maxSpeed) {
    const minAngle = -90;
    const maxAngle = 90;

    const safeSpeed = Math.min(speed, maxSpeed);
    const angle =
        minAngle + (safeSpeed / maxSpeed) * (maxAngle - minAngle);

    document.getElementById("needle").style.transform =
        `translateX(-50%) rotate(${angle}deg)`;
}

function getMaxSpeed(speed) {
    if (speed <= 100) return 100;
    if (speed <= 1000) return 1000;
    return 10000;
}

function updateScale(max) {
    document.getElementById("scaleMid").innerText = max / 2;
    document.getElementById("scaleMax").innerText = max;
}

// ================= MAIN =================
async function startTest() {
    const status = document.getElementById("status");
    status.innerText = "⏳ Sedang menguji koneksi...";

    setNeedle(0, 100);
    document.getElementById("download").innerText = "0.00";
    document.getElementById("downloadText").innerText = "-";
    document.getElementById("upload").innerText = "-";
    document.getElementById("ping").innerText = "-";

    // ===== PING =====
    let pingRes = await fetch("api/ping.php");
    let pingData = await pingRes.json();
    document.getElementById("ping").innerText = pingData.ping;

    // ===== DOWNLOAD =====
    status.innerText = "⬇️ Menguji kecepatan download...";

    let startTime = performance.now();
    let res = await fetch("assets/test/50mb.bin");
    await res.arrayBuffer();
    let endTime = performance.now();

    let time = (endTime - startTime) / 1000;
    let size = 50 * 8; // Mb
    let downloadSpeed = size / time;

    let max = getMaxSpeed(downloadSpeed);
    updateScale(max);

    document.getElementById("download").innerText = downloadSpeed.toFixed(2);
    document.getElementById("downloadText").innerText = downloadSpeed.toFixed(2);
    setNeedle(downloadSpeed, max);

    // ===== UPLOAD =====
    status.innerText = "⬆️ Menguji kecepatan upload...";

    let dummyData = new Uint8Array(20 * 1024 * 1024);
    let uploadStart = performance.now();

    await fetch("api/upload.php", {
        method: "POST",
        body: dummyData
    });

    let uploadEnd = performance.now();
    let uploadTime = (uploadEnd - uploadStart) / 1000;
    let uploadSpeed = (20 * 8) / uploadTime;

    document.getElementById("upload").innerText = uploadSpeed.toFixed(2);

    status.innerText = "✅ Tes selesai";

    saveResult(
        pingData.ping,
        downloadSpeed.toFixed(2),
        uploadSpeed.toFixed(2)
    );
}

// ================= SAVE =================
function saveResult(ping, download, upload) {
    let data = new FormData();
    data.append("ping", ping);
    data.append("download", download);
    data.append("upload", upload);

    fetch("api/save_result.php", {
        method: "POST",
        body: data
    });
}
