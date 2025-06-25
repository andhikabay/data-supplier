<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Supplier</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<h2>Tambah Supplier</h2>
<a href="index.php">← Kembali</a>

<form method="POST">
    <input type="text" value="(Id Otomatis)" readonly>
    <input type="text" name="nama" placeholder="Nama Supplier" required>
    <input type="text" name="alamat" placeholder="Alamat" required>
    <input type="text" name="telepon" placeholder="No. Telepon" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit" name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];

    mysqli_query($koneksi, "INSERT INTO supplier (nama_supplier, alamat, no_telepon, email)
                            VALUES ('$nama','$alamat','$telepon','$email')");

    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: 'Data berhasil disimpan!',
            background: '#ffffff',
            color: '#2c3e50',
            confirmButtonColor: '#3498db',
            confirmButtonText: 'Mantap',
            customClass: {
                popup: 'swal2-modern-popup',
                confirmButton: 'swal2-modern-button'
            }
        }).then(() => {
            window.location.href = 'index.php';
        });
    </script>";
}
?>

</body>
</html>
