<?php
require 'fungsi.php';

$id = (int) $_GET["id"]; // sanitasi id supaya aman dari SQL injection

if (hapusdata($id) > 0) {
    echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'mahasiswadata.php';
          </script>";
} else {
    echo "<script>
            alert('Data gagal dihapus!');
            document.location.href = 'mahasiswadata.php';
          </script>";
}

?>