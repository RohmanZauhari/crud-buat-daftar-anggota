<!doctype html>

<?php
   include 'koneksi.php';

   $id_siswa = '';
   $nisn = '';
   $nama_siswa = '';
   $jenis_kelamin = '';
   $alamat = '';


   if(isset($_GET['ubah'])){
      $id_siswa = $_GET['ubah'];
      $query = "SELECT * FROM tb_anggota WHERE id_siswa = '$id_siswa';";
      $sql = mysqli_query($conn, $query) ;
      $result = mysqli_fetch_assoc($sql);

      $nisn = $result ['nisn'];
      $nama_siswa = $result ['nama_siswa'];
      $jenis_kelamin = $result ['jenis_kelamin'];
      $alamat = $result ['alamat'];

      //var_dump($result);
     // die ();

   }
?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- link -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>kamar_pelajar</title>

  </head>
  <body>
    <nav class="navbar navbar-light bg-light mb-5 ">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          kamar_pelajar
        </a>
      </div>
    </nav>
    <div class="container">
        <form method="post" action="proses.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id_siswa; ?> " name="id_siswa" >
            <div class="mb-3 row">
                <label for="NISN" class="col-sm-2 col-form-label">
                    NISN
                </label>
                <div class="col-sm-10">
                  <input required type="text" name="nisn" class="form-control" id="NISN" placeholder="10032100050" value="<?php echo $nisn; ?>">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="NAMA" class="col-sm-2 col-form-label">
                    NAMA
                </label>
                <div class="col-sm-10">
                  <input required type="text" name="nama" class="form-control" id="NAMA" placeholder="XXXXXXXX" value="<?php echo $nama_siswa; ?>">
                </div>
              </div>
              <div class="mb-3 row">
                  <label for="jkel" class="col-sm-2 col-form-label">
                      JENIS KELAMIN
                  </label>
                  <div class="col-sm-10">
                  <?php
                    echo "" . $jenis_kelamin;
                    ?>
                    <select required id="jkel" name="jenis_kelamin" class="form-select"> 
                    <option select >JENIS KELAMIN</option>                       
                    <option <?php if(strcmp($jenis_kelamin, 'LAKI-LAKI') == 0){echo "selected";} ?> value="LAKI-LAKI">LAKI-LAKI</option>
                    <option <?php if(strcmp($jenis_kelamin, 'PEREMPUAN') == 0){echo "selected";} ?> value="PEREMPUAN">PEREMPUAN</option>
                    </select>
                  </div>
              </div>
              <div class="mb-3 row">
                <label for="FOTO" class="col-sm-2 col-form-label">
                    FOTO
                </label>
                <div class="col-sm-10">
                  <input <?PHP if(!isset($_GET['ubah'])){echo "required";} ?> class="form-control" type="file" name="foto" id="FOTO" accept="image/*">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="ALAMAT" class="col-sm-2 col-form-label">
                    ALAMAT
                </label>
                <div class="col-sm-10">
                  <textarea required class="form-control" name="alamat" id="ALAMAT" rows="3" placeholder="JL.DESA" ><?php echo $alamat; ?></textarea>
                </div>
              </div>
              <div class="mb-3 row mt-4">
                <div class="col">

                  <?php
                  if(isset($_GET['ubah'])){
                  ?>
                    <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                    Simpan
                    </button>
                  <?php
                    } else {
                  ?>
                      <button type="submit" name="aksi" value="add" class="btn btn-primary">
                      Tambahkan
                      </button>
                  <?php
                    }
                  ?>

                  <a href="index.php" type="button" class="btn btn-danger">
                    Batal
                  </a>
                  </div>
             </div>
        </form>
    </div>
  </body>
</html>