<?php

$koneksi = mysqli_connect("localhost", "root" , "",
"ropweekly");

$query = "SELECT *  FROM  mahasiswa";

$result = mysqli_query($koneksi, $query); ///lemari

//ambil data (fetch) mahasiswa dari object result
//mysqli_fetch_row() -> mengembalikan array numerik
//mysqli_fetch_assoc() -> mengembalikan array associative
//mysqli_fetch_array() -> mengembalikan keduanya
//mysqli_fetch_object() -> mengembalikan object
//while ($mhs = mysqli_fetch_assoc($result)) {
    //var_dump($mhs);
    //echo $mhs["nama"];

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
            Data Mahasiswa
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
                <a href="mhasiswadata.php">Data Mahasiswa</a>
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
    
    <h2>
        Data Mahasiswa
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
        $no = 1; // 1. Membuat variabel nomor urut
        while($mhs = mysqli_fetch_assoc($result))
        {
        ?>
            <tr>
                <td><?php echo $no++; ?></td> <td><?php echo $mhs["nama"]?></td>
                <td><?php echo $mhs["nim"]?></td>
                <td><?= $mhs["prodi"]; ?></td>
                <td><?= $mhs["email"]; ?></td>
                <td><?= $mhs["no_hp"]; ?></td>
                <td>
                    <img src="images/<?= $mhs['foto']; ?>" width="45px" height="auto">
                </td>
                <td>
                    <a href="edit.php?id=<?= $mhs['id']; ?>">Edit</a> | 
                    <a href="hapus.php?id=<?= $mhs['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    </div>
    </body>
</html>