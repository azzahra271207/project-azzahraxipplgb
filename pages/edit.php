<?php
$conn = new mysqli("localhost", "root", "", "pertemuan2azzahra");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil id dari URL
$id = intval($_GET['id']); // Menggunakan intval untuk mencegah serangan SQL Injection

// Ambil data catatan berdasarkan id
$result = $conn->query("SELECT * FROM notes WHERE id = $id");
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("Catatan tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Catatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0e5f0; /* Latar belakang ungu muda */
            font-family: 'Poppins', sans-serif;
        }

        .form-container {
            background-color: #e3f2fd; /* Biru muda */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 50px auto;
        }

        h2 {
            color: #1976d2; /* Warna biru untuk judul */
            text-align: center;
            font-weight: bold;
        }

        label {
            color: #1976d2; /* Warna biru untuk label */
            font-weight: 600;
        }

        .form-control {
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button[type="submit"] {
            background-color: #1976d2; /* Biru untuk tombol */
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #42a5f5; /* Biru lebih terang saat hover */
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #1976d2; /* Biru untuk link kembali */
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>Edit Catatan</h2>
        <form action="../actions/update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="mb-3">
                <label for="judul">Judul:</label>
                <input type="text" id="judul" name="judul" class="form-control" value="<?php echo htmlspecialchars($row['judul']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="isi">Isi Catatan:</label>
                <textarea id="isi" name="isi" class="form-control" rows="5" required><?php echo htmlspecialchars($row['isi']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="../index.php" class="back-link">Kembali ke Daftar Catatan</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
