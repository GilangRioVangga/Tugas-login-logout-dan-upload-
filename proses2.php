<?php

include("config.php");
if(isset($_POST['aksi'])){

    if($_POST['aksi']=='add'){
    $nama = $_POST['nama_guru'];
    $jk = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $email = $_POST['email'];
    // buat query
    $sql = "INSERT INTO guru (nama_guru, jenis_kelamin, alamat, no_telepon,email)
     VALUE ('$nama', '$jk', '$alamat','$no_telepon','$email')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index2.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index2.php?status=gagal');
    }

}else if($_POST['aksi']=='edit'){
$id_guru = $_POST['id_guru'];
$nama = $_POST['nama_guru'];
$jk = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_telepon = $_POST['no_telepon'];
$email = $_POST['email'];
$sql = "UPDATE guru SET nama_guru='$nama', jenis_kelamin='$jk', alamat='$alamat', jenis_kelamin='$jk', no_telepon='$no_telepon', email='$email'WHERE id_guru='$id_guru'";
 $query = mysqli_query($db, $sql);
 if( $query ) {
    // kalau berhasil alihkan ke halaman index.php dengan status=sukses
    header('Location:index2.php?status=sukses');
 }
  else {
    // kalau gagal alihkan ke halaman indek.php dengan status=gagal
    header('Location:index2.php?status=gagal');
 }
}
}
if(isset($_GET['hapus'])){
    $id_guru = $_GET['hapus'];
    $sql= "DELETE FROM guru WHERE id_guru='$id_guru';";
    $query = mysqli_query($db, $sql);
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index2.php?status=sukses');
     } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index2.php?status=gagal');
     }
}
?>