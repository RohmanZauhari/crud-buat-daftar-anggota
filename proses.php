<?php
  include 'koneksi.php';

  if(isset($_POST['aksi'])){
    if($_POST['aksi']=="add"){

      $nisn = $_POST['nisn'];
      $nama = $_POST['nama'];
      $jenis_kelamin = $_POST['jenis_kelamin'];
      $foto = $_FILES ['foto']['name'] ;
      $alamat = $_POST['alamat'];
      $dir = "img/";
      $tmpfile = $_FILES['foto']['tmp_name'];
      move_uploaded_file($tmpfile, $dir.$foto);

      $query = "INSERT INTO tb_anggota VALUES (null, '$nisn', '$nama', '$jenis_kelamin', '$foto', '$alamat' )";
      $sql = mysqli_query($conn, $query);

      if($sql){
        header("location: index.php");
          //echo "berhasil <a href='index.php'>[HOME]</a>";
      } else {
       echo $query;
    }

      //echo $nisn."|".$nama."|".$jenis_kelamin."|".$foto."|".$alamat;
      
       //echo "<br>Tambah Data <a href='index.php'>[HOME]</a>";
    } else if($_POST['aksi']=="edit"){
        //echo "Edit Data Data <a href='index.php'>[HOME]</a>";

        $id_siswa = $_POST['id_siswa'];
        $nisn = $_POST['nisn'];
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];

        $queryshow = "SELECT * FROM tb_anggota where id_siswa = '$id_siswa';";
        $sqlshow = mysqli_query($conn, $queryshow);
        $result = mysqli_fetch_assoc($sqlshow);

        if ($_FILES['foto']['name']) {
          $foto = $result['foto_siswa'];
      } else {
          $foto = $_FILES['foto']['name'];
          unlink("img/" . $result['foto_siswa']);
          move_uploaded_file($_FILES['foto']['tmp_name'], 'img/' . $_FILES['foto']['name']);
      }
        $query = "UPDATE tb_anggota SET nisn = '$nisn', nama_siswa = '$nama', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', foto_siswa = '$foto' WHERE id_siswa = '$id_siswa';";
        $sql = mysqli_query($conn, $query);
        header("location: index.php");

  }
  if(isset($_GET['hapus'])){
    $id_siswa = $_GET['hapus'];
    $queryshow = "SELECT * FROM tb_anggota where id_siswa = '$id_siswa';";
    $sqlshow = mysqli_query($conn, $queryshow);
    $result = mysqli_fetch_assoc($sqlshow);
    unlink("img/". $result ['foto_siswa']);
    

    $query = "DELETE FROM tb_anggota WHERE id_siswa = '$id_siswa';";
    $sql= mysqli_query($conn, $query);

    if($sql){
      header("location: index.php");
        //echo "berhasil <a href='index.php'>[HOME]</a>";
    } else {
     echo $query;
    }


    //echo "Hapus Data <a href='index.php'>[HOME]</a>";

  }

?>