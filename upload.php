<?php

include("config.php");
if(isset($_POST['save'])){

    if($_POST['save']=='add'){
    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];

    $path = "image/".$nama_file;

    // proses upload
    if(move_uploaded_file($tmp_file, $path)){// cek apakah gambar berhasil di upload atau tidak
        // Jika gambar berhasil di upload lakukan:
        // proses simpan ke database
        $query = "INSERT INTO gambar(nama,ukuran,tipe) VALUES('".$nama_file."','".$ukuran_file."','".$tipe_file."')";
        $sql = mysqli_query($db, $query);
        if($sql){
            header("location: data-upload.php");
        }else{
            // jika gagal
            echo "maaf , Terjadi kesalahan saat mencoba untuk menyimpan daat ke database.";
        echo"<br><a href='form-upload.php'>Kembali Ke Form</a>";
        }

        header('Location: data-upload.php');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        echo "maaf ,Gambar gagal di upload";
        echo"<br><a href='form-upload.php'>Kembali Ke Form</a>";
    }

}else if($_POST['save']=='edit'){
$id_gambar = $_POST['id_gambar'];
$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];

$path = "image/".$nama_file;

$query = "UPDATE gambar SET nama='".$nama_file."', ukuran='".$ukuran_file."', tipe='".$tipe_file."' WHERE id_gambar='$id_gambar'";
    $sql = mysqli_query($db, $query);
    if($query){
        header("location: data-upload.php?status=sukses");
    }else{
        // jika gagal
        echo "maaf , Terjadi kesalahan saat mencoba untuk menyimpan daat ke database.";
    echo"<br><a href='form-upload.php'>Kembali Ke Form</a>";
    }

    header('Location: data-upload.php?status=sukses');
} else {
    // kalau gagal alihkan ke halaman indek.php dengan status=gagal
    echo "maaf ,Gambar gagal di upload";
    echo"<br><a href='form-upload.php'>Kembali Ke Form</a>";
}
}
if(isset($_GET['hapus'])){
    $id_gambar = $_GET['hapus'];
    $sql= "DELETE FROM gambar WHERE id_gambar='$id_gambar';";
    $query = mysqli_query($db, $sql);
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: data-upload.php?status=sukses');
     } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: data-upload.php?status=gagal');
     }
}
?>