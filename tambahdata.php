<?php
require 'fungsi.php';

///jika tombol submit sudah ditekan
if (isset($_POST["submit"])) 
{
    /// Cek apakah data berhasil ditambahkan lewat fungsi di fungsi.php
    if (tambahdata($_POST, $_FILES["foto"]) > 0) 
    {
        // PERBAIKAN: Hapus atau komentari baris var_dump ini agar program tidak berhenti di sini
        // var_dump($_FILES["foto"]["name"]); die; 
        
        echo "<script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'mahasiswa.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'tambahdata.php';
              </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Data</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    
    <h1 align="center">
        WEB TI AZYA - 2026
    </h1>
    <div class="content-wrapper">
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
                <a href="mahasiswa.php">Data mahasiswa</a>
            </td>
            <td>
                <a href="latihan.php">Latihan</a>
            </td>
            <td>
                <a href="tambahdata.php">Form</a>
            </td>
        </tr>
    </table>
    <br><br>
    <h2>
        Latihan 3 (Kamis, 23 April 2026)
    </h2>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="nama">Nama Lengkap:</label>
        <br>
        <input type="text" id="nama" name="nama" style="width: 250px;" required>
        <br><br>

        <label for="nim">NIM:</label>
        <br>
        <input type="number" id="nim" name="nim" style="width: 250px;" required>
        <br><br>

        <label for="prodi">Program Studi:</label>
        <br>
        <input type="text" id="prodi" name="prodi" style="width: 250px;" required>
        <br><br>

        <label for="email">E-mail:</label>
        <br>
        <input type="email" id="email" name="email" style="width: 250px;" required>
        <br><br>

        <label for="no_hp">Nomor HP:</label>
        <br>
        <input type="number" id="no_hp" name="no_hp" style="width: 250px;" required>
        <br><br>

        <label for="foto">Upload Foto:</label>
        <br>
        <input type="file" id="foto" name="foto" style="width: 250px;" required>
        <br><br>

        <button type="submit" name="submit" style="padding: 5px 15px;">Tambah Data</button>
    </form>
    </div>
    <hr>
    <footer align="center">
        <p>
            
        </p>
    </footer>
</body>
</html>