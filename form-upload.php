<?php include("config.php"); 
$id ='';
$nama = '';
$ukuran = '';
$jenis = '';

if(isset($_GET['edit'])){
  $id_gambar =$_GET['edit'];
  $sql ="SELECT * FROM gambar WHERE id_gambar='$id_gambar';";
  $query = mysqli_query($db, $sql);
  $result =mysqli_fetch_assoc($query);
  $id = $result['id_gambar'];
  $nama = $result['nama'];
  $ukuran = $result['ukuran'];
  $jenis = $result['tipe'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 1 Lagos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SMK Negeri 1 Lagos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
      <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        <a class="nav-link" href="index.php">data siswa</a>
        <a class="nav-link" href="index2.php">data guru</a>
        <a class="nav-link" href="data-upload.php">data upload</a>
        <a class="nav-link" href="logout.php">logout</a>
      </div>
    </div>
  </div>
</nav>
    <div class="container mt-4">
        <h2>Form Uplod File</h2><br>
        <form method="POST" enctype="multipart/form-data" action="upload.php">
        <input type="hidden" value="<?php echo $id_gambar;?>" name="id_gambar">
        <div class="mb-3">
            <label for="foto" class="form-label">Foto: </label>
            <input type="file" class="form-control" name="gambar"/>
        </div>
        <div class="mb-3 row mt-4">
            <div class="col">
            <?php
  if (isset($_GET['edit'])){
    ?>
    <button type="submit" name="save" value="edit" class="btn btn-primary">
      simpan perubahan 
  </button>
  <?php
  }else{
    ?>
    <button type="submit"  name="save" value="add" class="btn btn-primary">
      Daftar
      </button>
      <?php
  }
  ?>
   <a href="data-upload.php" type="button" class="btn btn-danger">batal</a>
   </div>
            </div>
            </div>
            </form>
            </div>
            </body>
</html>