<?php include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id_supplier='$id'");
$d = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Supplier</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<h2>Edit Data Supplier</h2>
<a href="index.php">← Kembali</a>

<form method="POST">
    <input type="text" value="<?= $d['id_supplier'] ?>" readonly>
    <input type="text" name="nama" value="<?= $d['nama_supplier'] ?>" required>
    <input type="text" name="alamat" value="<?= $d['alamat'] ?>" required>
    <input type="text" name="telepon" value="<?= $d['no_telepon'] ?>" required>
    <input type="email" name="email" value="<?= $d['email'] ?>" required>
    <button type="submit" name="update">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
    mysqli_query($koneksi, "UPDATE supplier SET 
        nama_supplier='$_POST[nama]', 
        alamat='$_POST[alamat]',
        no_telepon='$_POST[telepon]',
        email='$_POST[email]' 
        WHERE id_supplier='$id'");

    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Sipp!',
            text: 'Data berhasil diupdate!',
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
