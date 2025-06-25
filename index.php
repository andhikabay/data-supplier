<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Supplier</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<h2>Data Supplier</h2>
<a href="tambah.php">+ Tambah Data</a>

<table>
    <tr>
        <th>No</th>
        <th>ID Supplier</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No. Telepon</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>

    <?php
    $data = mysqli_query($koneksi, "SELECT * FROM supplier ORDER BY id_supplier ASC");
    $no = 1;
    while ($d = mysqli_fetch_array($data)) {
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $d['id_supplier'] ?></td>
        <td><?= $d['nama_supplier'] ?></td>
        <td><?= $d['alamat'] ?></td>
        <td><?= $d['no_telepon'] ?></td>
        <td><?= $d['email'] ?></td>
        <td class="actions">
            <a href="edit.php?id=<?= $d['id_supplier'] ?>">Edit</a> |
            <a href="#" class="hapus" data-id="<?= $d['id_supplier'] ?>">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>


<script>
    const hapusLinks = document.querySelectorAll('.hapus');

    hapusLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const id = this.getAttribute('data-id');

            Swal.fire({
                title: 'Yakin mau dihapus?',
                text: "Data yang dihapus tidak bisa dibalikin!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal',
                background: '#ffffff',
                color: '#2c3e50',
                customClass: {
                    popup: 'swal2-modern-popup',
                    confirmButton: 'swal2-modern-button'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "hapus.php?id=" + id;
                }
            });
        });
    });
</script>

</body>
</html>
