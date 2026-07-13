<?php
require 'fungsi.php'; // Menggunakan koneksi & fungsi yang sama dengan file lain (dulu file ini punya koneksi sendiri yang berbeda)

$query = "SELECT * FROM mahasiswa";
$data = tampildata($query); // Menggunakan fungsi tampildata() dari fungsi.php, bukan while(mysqli_fetch_assoc()) manual
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            WEB TI AZYA - 2026 | SEMESTER 2
        </title>
        <link rel="stylesheet" href="assets/style.css">
    </head>
    <body>
        <h1 align="center">
            Data mahasiswadata
        </h1>
        <table border="1" align="center" cellspacing="0" cellpadding="10px">
            <tr>
                <td>
                <a href="index.php">Home</a>
            </td>
            <td>
                <a href="profile.php">Profile</a>
            </td>
            <td>
                <a href="contact.php">Contact</a>
            </td>
            <td>
                <a href="mahasiswadata.php">Data mahasiswadata</a>
            </td>
            <td>
                <a href="latihan.php">Latihan</a>
            </td>
            <td>
                <a href="form.php">Form</a>
            </td>
            </tr>
            </table>
            <br><br>

            <a href="tambahdata.php"><button>Tambah Data</button></a>

    <div class="content-wrapper">
    <h2>
        Data mahasiswadata
    </h2>

    <table border="1" cellpadding="5px">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Program Studi</th>
            <th>Email</th>
            <th>Nomor Whatsapp</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        foreach ($data as $mhs) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $mhs["nama"]?></td>
                <td><?php echo $mhs["nim"]?></td>
                <td><?= $mhs["prodi"]; ?></td>
                <td><?= $mhs["email"]; ?></td>
                <td><?= $mhs["no_hp"]; ?></td>
                <td>
                    <img src="images/<?= $mhs['foto']; ?>" width="45px" height="auto">
                </td>
                <td>
                    <a href="editdata.php?id=<?= $mhs['id']; ?>">Edit</a> |
                    <a href="hapusdata.php?id=<?= $mhs['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    </div>
    </body>
</html>
