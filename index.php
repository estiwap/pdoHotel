<?php  
    include 'db.php';

    // Buat prepared statement untuk mengambil semua data dari tbBiodata
    $query = $db->prepare("SELECT t.id, t.nama, t.alamat, t.telp, t.keterangan, k.no_kamar, k.type_kamar, k.lama_inap from tamu t, kamar k where t.id=k.id");
    // Jalankan perintah SQL
    $query->execute();
    // Ambil semua data dan masukkan ke variable $value
    $value = $query->fetchAll();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Input Booking Hotel</title>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
      <div class="container">
        <div class="col s12"></div><br />
        <div class="row">
          <div class="col s12">
            <h5><b> <i class="material-icons">airplay</i></b> Crud Booking Hotel</h5><br />
            <a href="input.php" title="Tambah Data" class="btn-floating btn-large waves-effect teal lighten-2"><i class="material-icons">add</i></a>
            <table class="responsive-table">
              <thead>
                <tr>
                  <th data-field="id">#</th>
                  <th data-field="id">ID Tamu</th>
                  <th data-field="id">Nama</th>
                  <th data-field="price">No Telp</th>
                  <th data-field="name">Alamat</th>
                  <th data-field="price">No kamar</th>
                  <th data-field="price">Jenis Kamar</th>
                  <th data-field="price">Lama Inap</th>
                  <th data-field="price">Keterangan</th>
                  <th data-field="price">Aksi</th>
              </tr>
            </thead>
            <?php
            $no = 1;
            foreach ($value as $value): ?>
              
              <tbody>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $value['id'] ?></td>
                  <td><?php echo $value['telp']; ?></td>
                  <td><?php echo $value['nama']; ?></td>
                  <td><?php echo $value['alamat']; ?></td>
                  <td><?php echo $value['type_kamar']; ?></td>
                  <td><?php echo $value['no_kamar']; ?></td>
                  <td><?php echo $value['lama_inap']; ?></td>
                  <td><?php echo $value['keterangan']; ?></td>
                  <td>
                  <a href="edit.php?id=<?php echo $value['id']; ?>&aksi=edit" class="btn-floating  lime darken-4"><i class="material-icons">edit</i></a>
                  <a href="proses.php?id=<?php echo $value['id']; ?>&aksi=hapus" class="btn-floating red lighten-2"><i class="material-icons">delete</i></a>
                  </td>
                </tr>
              </tbody>
              <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
  </body>
</html>
