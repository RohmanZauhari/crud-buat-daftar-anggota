<?php
    include 'koneksi.php';

    // Menjalankan query SQL
    $query = "SELECT * FROM tb_anggota;";
    $sql = mysqli_query($conn, $query);
    $no  = 0;

    // Mencoba data
    //while ($result = mysqli_fetch_assoc($sql)){
       //echo $result ['nama_siswa']."<br>";

?>

<!doctype html>
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
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">

        <a class="navbar-brand" href="#">
          kamar_pelajar
        </a>
      </div>
    </nav>

    <!--judul-->
    <div class="container">
      <h1 class="mt-4">Daftar Anggota KP</h1>
      <figure>
        <blockquote class="blockquote">
          <p>Berisi Data yang di simpan di Databases.</p>
        </blockquote>
        <figcaption class="blockquote-footer">
          CRUD <cite title="Source Title">Cread Read Update Delete</cite>
        </figcaption>
      </figure>  
      <a href="kelola.php" button type="button" class="btn btn-primary mb-3">
        Tambah Data
      </a>
      <div class="table-responsive">
        <table class="table align-middle table-hover">
          <caption>tetap semangat </caption>
          <thead>
            <tr>
              <th ><center>NO</center></th>
              <th >NISN</th>
              <th >NAMA</th>
              <th >JENIS KELAMIN</th>
              <th >FOTO</th>
              <th >ALAMAT</th>
              <th >AKSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
                   while ($result = mysqli_fetch_assoc($sql)){
            ?>
             <tr>
                <th ><center>
                <?Php echo ++$no ;?>.
                </center></th>
                <td><?Php echo $result ['nisn'];?></td>
                <td><?Php echo $result ['nama_siswa'];?></td>
                <td><?Php echo $result ['jenis_kelamin'];?></td>
                <td>
                  <img src="img/<?Php echo $result ['foto_siswa'];?>" alt="" style="width: 100px;">
                </td>
                <td><?Php echo $result ['alamat'];?></td>
                <td>
                  <a href="kelola.php?ubah=<?Php echo $result ['id_siswa'];?>" type="button" class="btn btn-success btn-sm">
                    Ubah
                  </a>
                  <a href="proses.php?hapus=<?Php echo $result ['id_siswa'];?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('apakah kamu syakin ingin membuang ini ? apa gak sayang')">
                    Hapus
                  </a>
                </td>
             </tr>
            <?php
                   }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>