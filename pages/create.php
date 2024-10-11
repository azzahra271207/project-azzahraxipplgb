<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Catatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="text-center text-primary">Tambah Catatan Baru</h2>

            <form action="../actions/store.php" method="POST">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul:</label>
                    <input class="form-control" type="text" id="judul" name="judul" required>
                </div>

                <div class="mb-3">
                    <label for="isi" class="form-label">Isi Catatan:</label>
                    <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Simpan</button>
                <a href="../index.php" class="d-block text-center mt-3 text-decoration-none">
                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Catatan
                </a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
