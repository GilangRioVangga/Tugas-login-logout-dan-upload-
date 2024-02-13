<?php

include("config.php");
if(isset($_POST['aksi'])){

    if($_POST['aksi']=='add'){
    $nama = $_POST['nama'];
    $no_telepon = $_POST['no_telepon'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kabupaten = $_POST['kabupaten'];
    $provinsi = $_POST['provinsi'];
    $kode_pos = $_POST['kode_pos'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal']; 
    $tanggal_mysql = date("Y-m-d", strtotime($tanggal));

    // buat query
    $sql = "INSERT INTO pendaftaran (nama, alamat, jenis_kelamin, agama, sekolah_asal,no_telepon,email, kode_pos, desa,kecamatan,kabupaten,provinsi,tangga_lahir)
     VALUE ('$nama', '$alamat', '$jk', '$agama', '$sekolah','$no_telepon','$email','$kode_pos','$desa','$kecamatan','$kabupaten','$provinsi','$tanggal_mysql')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }

}else if($_POST['aksi']=='edit'){
$id_pendaftaran = $_POST['id_pendaftaran'];
$nama = $_POST['nama'];
$tanggal = $_POST['tangga_lahir'];
$jk = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];
$desa = $_POST['desa'];
$kecamatan = $_POST['kecamatan'];
$kabupaten = $_POST['kabupaten'];
$provinsi = $_POST['provinsi'];
$kode_pos = $_POST['kode_pos'];
$no_telepon = $_POST['no_telepon'];
$email = $_POST['email'];
$sekolah = $_POST['sekolah_asal'];
$tanggal_mysql = date("Y-m-d", strtotime($tanggal));
$sql = "UPDATE pendaftaran SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah', tangga_lahir='$tanggal_mysql', no_telepon='$no_telepon', email='$email', desa='$desa', kecamatan= '$kecamatan', kabupaten='$kabupaten', provinsi='$provinsi', kode_pos='$kode_pos' WHERE id_pendaftaran='$id_pendaftaran'";

 $query = mysqli_query($db, $sql);
 if( $query ) {
    // kalau berhasil alihkan ke halaman index.php dengan status=sukses
    header('Location:index.php?status=sukses');
 }
  else {
    // kalau gagal alihkan ke halaman indek.php dengan status=gagal
    header('Location:index.php?status=gagal');
 }
}
}
if(isset($_GET['hapus'])){
    $id_pendaftaran = $_GET['hapus'];
    $sql= "DELETE FROM pendaftaran WHERE id_pendaftaran='$id_pendaftaran';";
    $query = mysqli_query($db, $sql);
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
     } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
     }
}
?>