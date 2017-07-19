<?php  
    include 'db.php';

    if(isset($_POST['submit'])){
        // Simpan data yang di inputkan ke POST ke masing-masing variable
        // dan convert semua tag HTML yang mungkin dimasukkan untuk mengindari XSS
      $id         = htmlentities($_POST['id']);
      $nama       = htmlentities($_POST['nama']);
      $alamat     = htmlentities($_POST['alamat']);
      $no_kamar   = htmlentities($_POST['no_kamar']);
      $telp       = htmlentities($_POST['telp']);
      $lama_inap  = htmlentities($_POST['lama_inap']);
      $keterangan = htmlentities($_POST['keterangan']);
        
        // Prepared statement untuk menambah data
        $query = $db->prepare("INSERT INTO `tbBiodata`(`nama`, `alamat`, `hp`)
        VALUES (:nama,:alamat,:hp)");
        $query->bindParam(":nama", $nama);
        $query->bindParam(":alamat", $alamat);
        $query->bindParam(":hp", $hp);
        // Jalankan perintah SQL
        $query->execute();
        // Alihkan ke index.php
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Input Booking Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
    <script>
         $(document).ready(function() {
         $('select').material_select();
      });
      </script>
    </head>
    <body>
      <div class="container">
        <div class="col s12"></div><br />
        <div class="row">
          <div class="col s12">
            <h5><b> <i class="material-icons">receipt</i></b> Input Booking Hotel</h5><br />
            <a href="index.php" title="Home" class="btn-floating btn-large waves-effect red"><i class="material-icons">store</i></a>
            <form class="col s12" action="proses.php?aksi=tambah" method="post">
              <div class="input-field col s6 col s6">
                <input id="icon_prefix" type="text" name="id" id="id" class="validate">
                <label for="last_name">ID Tamu </label>
              </div>
              <div class="input-field col s6 col s6">
                <input id="icon_prefix" type="text" name="nama" id="nama" class="validate">
                <label for="last_name">Nama </label>
              </div>
              <div class="input-field col s6">
                <input id="icon_telephone" type="text" name="alamat" id="alamat"  class="validate">
                <label for="last_name">Alamat</label>
              </div>

              <div class="input-field col s6">
                <input id="icon_telephone" type="text" name="telp" id="telp"  class="validate">
                <label for="last_name">No Telp</label>
              </div>

              <div class="input-field col s6">
                <input id="icon_telephone" type="text" name="no_kamar" id="no_kamar"  class="validate">
                <label for="last_name">Nomer Kamar</label>
              </div>
              <div class="input-field col s6">
                <input id="icon_telephone" type="text" name="lama_inap" id="lama_inap"  class="validate">
                <label for="last_name">Lama Inap</label>
              </div>

              <div class="input-field col s6">
                <select name="type_kamar">
                  <option value="" disabled selected>Pilih Jenis Kamar</option>
                  <option value="1">Standart Room</option>
                  <option value="2">Superrior Room</option>
                  <option value="3">Deluxe Room</option>
                  <option value="4">Suite Room</option>
                </select>
                  <label>Tipe Kamar</label>
              </div>
              <div class="input-field col s6">
                <textarea id="textarea1" class="materialize-textarea" name="keterangan"></textarea>
                <label for="textarea1">Keterangan</label>
              </div><br>
              <div class="input-field col s6">
                <input class="btn waves-effect waves-light" type="submit" value="Simpan">
              </div>
            </form>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
</html>
