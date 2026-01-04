<?php
require "config.php";
$data = $conn->query("SELECT * FROM hasil_tes ORDER BY waktu_tes DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Speed Test</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="app" style="flex-direction:column;">
    <h2>📊 Riwayat Speed Test</h2>

    <table width="100%" cellpadding="10" cellspacing="0" border="1">
        <tr>
            <th>Waktu</th>
            <th>Ping (ms)</th>
            <th>Download (Mbps)</th>
            <th>Upload (Mbps)</th>
            <th>Aksi</th>
        </tr>

        <?php
        while ($row = $data->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['waktu_tes']}</td>";
            echo "<td>{$row['ping']}</td>";
            echo "<td>{$row['download']}</td>";
            echo "<td>{$row['upload']}</td>";
            echo "<td class='action-cell'>
                    <span class='delete-btn'
                          onclick='showDeleteToast({$row['hasil_id']})'>
                        🗑️
                    </span>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <br>
    <a href="index.php" class="muted-link">← kembali ke speed test</a>
</div>

<!-- TOAST CONFIRM -->
<div class="toast-overlay" id="toastOverlay">
    <div class="toast">
        <p>Yakin ingin hapus data ini?</p>
        <div class="toast-actions">
            <button class="confirm" onclick="confirmDelete()">Hapus</button>
            <button class="cancel" onclick="hideToast()">Batal</button>
        </div>
    </div>
</div>

<script>
    let deleteId = null;

    function showDeleteToast(id) {
        deleteId = id;
        document.getElementById("toastOverlay").style.display = "flex";
    }

    function hideToast() {
        deleteId = null;
        document.getElementById("toastOverlay").style.display = "none";
    }

    function confirmDelete() {
        if (!deleteId) return;
        window.location.href = "api/delete_result.php?id=" + deleteId;
    }
</script>

</body>
</html>
