<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perhitungan Diskon</title>

    <!-- Menyambungkan file CSS eksternal untuk styling halaman -->
    <link rel="stylesheet" href="styel.css">

    <!-- Link ke file CSS Bootstrap dari CDN untuk styling halaman -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Kontainer utama untuk form perhitungan diskon -->
    <div class="container mt-5">
        <h2 class="text-center">Aplikasi Perhitungan Diskon</h2>

        <!-- Form untuk input harga dan diskon -->
        <form method="POST" class="border rounded bg-light p-2">
            <label class="form-label">Harga Barang (rp)</label>
            <!-- Input untuk harga barang dengan validasi agar hanya menerima angka -->
            <input type="number" name="harga" class="form-control" step="0.01" placeholder="Masukkan harga barang" min="0" autocomplete="off"
            required onkeypress="return event.charCode >= 48 && event.charCode <=57">

            <label class="form-label">Diskon (%)</label>
            <!-- Input untuk diskon, maksimal 3 digit, hanya menerima angka -->
            <input type="text" maxlength="3" name="diskon" class="form-control" step="0.01" placeholder="Masukkan diskon (0-100)" autocomplete="off" min="0" 
            required onkeypress="return event.charCode >= 48 && event.charCode <=57">

            <!-- Tombol untuk menghitung diskon -->
            <button type="submit" class="btn custom-button w-100 mt-2" name="hitung">Hitung Diskon</button>
        </form>

        <?php
        // Cek apakah form sudah disubmit
        if (isset($_POST['hitung'])){
            // Ambil nilai harga dan diskon dari form
            $harga = $_POST['harga'];
            $diskon = $_POST['diskon'];

            // Validasi harga dan diskon
            if ($harga < 0){
                echo "<script> alert('Harga yang dimasukkan tidak boleh kurang dari 0!')</script>";
            } elseif ($diskon < 0 || $diskon > 100){
                echo "<script> alert('Diskon yang dimasukkan tidak boleh lebih dari 100!')</script>";
            } else {
                // Hitung nilai diskon
                $nilai_diskon = $harga * ($diskon / 100);
                // Hitung total harga setelah diskon
                $total_harga = $harga - $nilai_diskon;
                ?>
                <!-- Menampilkan hasil perhitungan harga setelah diskon -->
                <div class="total-price">
                    <h4>Total Harga Setelah Diskon</h4>
                    <p><b>Rp <?php echo number_format($total_harga, 2, ',', '.'); ?></b></p>
                </div>
        <?php    
            }
        } 
        ?>
    </div>

    <!-- Menampilkan copyright di bawah halaman -->
    <p class="text-center">&copy;  UKK RPL 2025 | Januari Aditya Gea | XII RPL 2</p>

    <!-- Tombol untuk mengubah tema -->
    <button class="toggle-theme-btn" onclick="toggleTheme()">Ubah Tema</button>

    <!-- Menyambungkan file JavaScript Bootstrap untuk fungsionalitas halaman -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
