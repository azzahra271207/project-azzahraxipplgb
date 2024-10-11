<?php
// Menghubungkan ke database
require 'koneksi.php';

// Query untuk mengambil data dari tabel notes
$sql = "SELECT * FROM notes ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Catatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light p-4">
    <div class="container shadow p-4 rounded-3 bg-white"> <!-- Tambah rounded-3 untuk kotak melengkung -->
        <h2 class="text-center mb-4 text-primary fw-bold" style="font-family: 'Pacifico', cursive;">Daftar Catatan</h2>

        <!-- Tombol menuju halaman About Me -->
        <a class="btn btn-info mb-4 rounded-pill" href="about-me.php"> <!-- Tambah rounded-pill untuk tombol melengkung -->
            <i class="bi bi-person-circle"></i> Tentang Saya
        </a>

        <!-- Tombol tambah catatan -->
        <a class="btn btn-primary mb-4 rounded-pill" href="pages/create.php"> <!-- Tambah rounded-pill untuk tombol melengkung -->
            <i class="bi bi-plus-circle"></i> Tambah Catatan Baru
        </a>

        <div class="table-responsive rounded-3"> <!-- Tambah rounded-3 untuk tabel melengkung -->
            <table class="table table-hover table-bordered rounded-3"> <!-- Tambah rounded-3 untuk tabel melengkung -->
                <thead class="table-primary text-center">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Isi Catatan</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $no = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='text-center'>" . $no++ . "</td>";
                            echo "<td>" . $row['judul'] . "</td>";
                            echo "<td>" . $row['isi'] . "</td>";
                            echo "<td class='text-center'>" . date('d-m-Y H:i', strtotime($row['created_at'])) . "</td>";
                            echo "<td class='text-center'>";

                            // Tombol Edit
                            echo "<a href='pages/edit.php?id=" . $row['id'] . "' class='btn btn-warning me-2 rounded-pill'>";
                            echo "<i class='bi bi-pencil'></i> Edit</a>";

                            // Tombol Hapus dengan konfirmasi
                            echo "<a href='pages/delete.php?id=" . $row['id'] . "' class='btn btn-danger rounded-pill' ";
                            echo "onclick='return confirm(\"Apakah anda yakin ingin menghapus catatan ini?\")'>";
                            echo "<i class='bi bi-trash'></i> Hapus</a>";

                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>Tidak ada catatan</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tombol floating untuk tambah catatan -->
    <a class="btn btn-primary rounded-circle position-fixed bottom-0 end-0 m-4 p-3" href="pages/create.php">
        <i class="bi bi-plus-circle" style="font-size: 1.5rem;"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
