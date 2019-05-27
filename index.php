<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/dp.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="row">
      <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">LOGO</a>
              
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <!--ACCESS MENUS FOR ADMIN-->
                
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="./pemilih/">Pemilihan RW</a></li>

                  <li class="dropdown"><a href="#">Pemilihan RT</a>
                    <ul class="isi-dropdown">
                      <li><a href="./pemilih_rt01/">Pemilihan RT 01</a></li>
                      <li><a href="./pemilih_rt02/">Pemilihan RT 02</a></li>
                      <li><a href="./pemilih_rt03/">Pemilihan RT 03</a></li>
                      <li><a href="./pemilih_rt04/">Pemilihan RT 04</a></li>
                    </ul>
                  </li>
                
                   <li class="dropdown"><a href="#">Hasil Pemilihan</a>
                    <ul class="isi-dropdown">
                      <li><a href="./pemilih/dashboard.php?page=perolehan">RW</a></li>
                      <li><a href="./pemilih_rt01/dashboard.php?page=perolehan">RT 01</a></li>
                      <li><a href="./pemilih_rt02/dashboard.php?page=perolehan">RT 02</a></li>
                      <li><a href="./pemilih_rt03/dashboard.php?page=perolehan">RT 03</a></li>
                      <li><a href="./pemilih_rt04/dashboard.php?page=perolehan">RT 04</a></li>
                    </ul>
                  </li>
                
              </ul>
              
            </div><!--/.nav-collapse -->
          </div><!--/.container-fluid -->
        </nav>

        <div class="col-md-9">
   <h3>Daftar RT</h3>
</div>
<!-- <div class="col-md-3" style="padding-top:10px;">
   <a class="btn btn-primary" href="?page=data_rt&action=tambah">Tambah Kelas</a>
</div> -->
<div style="clear:both"></div>
<hr />
<div class="row">
   <div class="col-md-8">
      <table class="table table-striped">
         <thead>
            <tr>
               <th width="80px" style="text-align:center;">#</th>
               <th style="text-align:center;">Kelas RT</th>
               <th width="150px" style="text-align:center;">Jumlah Penduduk</th>
               <!-- <th width="200px" style="text-align:center;">Opsi</th> -->
            </tr>
         </thead>
         <tbody>
            <?php
            include './include/connection.php';
            $sql = mysqli_query($con, "SELECT a.*, (SELECT COUNT(id_kelas) FROM t_pemilih WHERE id_kelas = a.id_kelas) AS jumlah FROM t_kelas a ORDER BY a.id_kelas ASC");

            if (mysqli_num_rows($sql) > 0) {

               while($data = mysqli_fetch_array($sql)) {
                  ?>
                  <tr>
                     <td style="text-align:center; vertical-align:middle">
                        <?php echo $data['id_kelas']; ?>
                     </td>
                     <td style="text-align:center; vertical-align:middle">
                        <?php echo $data['nama_kelas']; ?>
                     </td>
                     <td style="text-align:center; vertical-align:middle">
                        <?php echo $data['jumlah']; ?> Orang
                     </td>
                     <!-- <td style="text-align:center;">
                        <a href="?page=data_rt&action=edit&id=<?php echo $data['id_kelas']; ?>" class="btn btn-warning btn-sm">
                           Edit
                        </a>
                        <a href="?page=data_rt&action=hapus&id=<?php echo $data['id_kelas']; ?>" onclick="return confirm('Yakin ingin menghapus kelas ini ?');" class="btn btn-danger btn-sm">
                           Hapus
                        </a>
                     </td> -->
                  </tr>
                  <?php
               }
            } else {

               echo "<tr>
                        <td colspan='4' style='text-align:center;'><h4>Belum ada data</h4></td>
                     </tr>";
            }
            ?>
         </tbody>
      </table>
   </div>
</div>
 
      </div>
    </div>
 
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery-2.2.3.min.js"></script>
  </body>
</html>