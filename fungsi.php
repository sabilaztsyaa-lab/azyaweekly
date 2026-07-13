<?php
// Sesuaikan koneksi database kamu
$koneksi = mysqli_connect("localhost", "root", "", "azyaweekly");

// Cek apakah koneksi database error
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    die();
}

function tampildata($query_string) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query_string);
    
    if (!$result) {
        echo "Error SQL: " . mysqli_error($koneksi);
        return [];
    }

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function hapusdata($id) 
{
    global $koneksi;    
    $id = (int) $id; // sanitasi id supaya aman dari SQL injection
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// Tambahkan fungsi baru ini di paling bawah file fungsi.php
function tambahdata($data, $files) {
    global $koneksi;

    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $email = htmlspecialchars($data["email"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $namafoto = $files["name"];
    $tmpfoto = $files["tmp_name"];

    // Folder upload disamakan dengan yang dipakai mahasiswa.php ("images/")
    $path = "images/$namafoto";

    if(move_uploaded_file($tmpfoto, $path)) {
        $query = "INSERT INTO mahasiswa (nama, nim, prodi, email, no_hp, foto) 
                VALUES ('$nama', '$nim', '$prodi', '$email', '$no_hp', '$namafoto')";
                
        // Menggunakan try-catch agar jika duplikat, program tidak langsung fatal error
        try {
            mysqli_query($koneksi, $query);
        } catch (mysqli_sql_exception $e) {
            // Jika terjadi error karena NIM kembar atau hal lain, return 0 (gagal)
            return 0;
        }
    }
    return mysqli_affected_rows($koneksi);
}

function editdata($data, $files, $id) {
    global $koneksi;

    $id = (int) $id; // sanitasi id (angka saja) supaya aman dari SQL injection
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $prodi = htmlspecialchars($data["prodi"]); // Mengambil input Program Studi yang diketik
    $email = htmlspecialchars($data["email"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $namafoto = $files["name"];
    $tmpfoto = $files["tmp_name"];

    // Cek apakah user benar-benar upload foto baru
    if (!empty($namafoto)) {
        $newnamafoto = date("dmYHis_").$namafoto; // Menambahkan timestamp untuk menghindari duplikat nama file
        $path = "images/$newnamafoto";

        if (move_uploaded_file($tmpfoto, $path)) {
            // Foto baru berhasil diupload -> UPDATE termasuk kolom foto
            $query = "UPDATE mahasiswa SET 
                        nama = '$nama', 
                        nim = '$nim', 
                        prodi = '$prodi', 
                        email = '$email', 
                        no_hp = '$no_hp', 
                        foto = '$newnamafoto' 
                      WHERE id = '$id'";
            mysqli_query($koneksi, $query);
        }
    } else {
        // Tidak ada foto baru yang diupload, tetap gunakan foto lama
        $query = "UPDATE mahasiswa SET 
                    nama = '$nama', 
                    nim = '$nim', 
                    prodi = '$prodi', 
                    email = '$email', 
                    no_hp = '$no_hp' 
                  WHERE id = '$id'";
        mysqli_query($koneksi, $query);
    }

    return mysqli_affected_rows($koneksi);
}
?>