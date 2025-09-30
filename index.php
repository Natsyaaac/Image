<?php
require 'koneksi.php';  // pastikan ini file koneksi ke database

// Query pakai VIEW yang sudah kamu buat sebelumnya
$sql = "SELECT nim, nama_mhs, tgl_lahir, jenis_klmin, usia FROM view_mahasiswa_dengan_usia LIMIT 100";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Daftar Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- jQuery dan DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#tabelMahasiswa').DataTable({
            "pageLength": 10,
            "lengthMenu": [5, 10, 25, 50]
        });
    });
    </script>
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Daftar Mahasiswa</h2>

    <?php if ($result && $result->num_rows > 0): ?>
    <table id="tabelMahasiswa" class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Usia</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['nim']) ?></td>
                <td><?= htmlspecialchars($row['nama_mhs']) ?></td>
                <td><?= htmlspecialchars($row['tgl_lahir']) ?></td>
                <td><?= htmlspecialchars($row['jenis_klmin']) ?></td>
                <td><?= htmlspecialchars($row['usia']) ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>Data mahasiswa tidak ditemukan.</p>
    <?php endif; ?>

</div>
</body>
</html>

<?php $conn->close(); ?>
