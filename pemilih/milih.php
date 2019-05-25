<?php
define("BASEPATH", dirname(__FILE__));
session_start();
if(!isset($_SESSION['siswa'])) {
   header('location:./index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../assets/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../assets/Ionicons/css/ionicons.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <?php
         require('../include/connection.php');

         $thn     = date('Y');
         $dpn     = date('Y') + 1;
         $periode = $thn.'/'.$dpn;

         $sql = $con->prepare("SELECT * FROM t_calon_rw WHERE periode = ?") or die($con->error);
         $sql->bind_param('s', $periode);
         $sql->execute();
         $sql->store_result();
         if ($sql->num_rows() > 0) {
            $numb = $sql->num_rows();
            echo '<div class="text-center" style="padding-top:20px;">
                     <h2>Daftar Calon Periode '.$periode.'</h2>
                  </div>
                  <hr />';

            echo '<div class="row">';

            echo '<div class="col-md-10 col-md-offset-1">';

               for ($i = 1; $i <= $numb; $i++) {
                  $sql->bind_result($id, $nama, $foto, $visi, $misi, $suara, $periode);
                  $sql->fetch();
         ?>

    <div class="row" style="margin-bottom:100px;">
        <div class="col-md-6">
            <center><h3>Calon RW No Urut<br>0<?php echo $i; ?></h3>
                <img src="../assets/img/rw/<?php echo $foto; ?>" class="img-responsive img-thumbnail" />
                <p><h5><strong><?php echo $nama; ?></strong></h5></p>
                <p>
               <a href="../pemilih/visimisi.php?id=<?php echo $id; ?>" class="btn btn-primary" >Lihat Visi Misi <i class="glyphicon glyphicon-play"></i></a>
                </p>
                <p>
               <a href="./submit.php?id=<?php echo $id; ?>&s=<?php echo $suara; ?>" class="btn btn-danger" >Beri Suara<i class="glyphicon glyphicon-play"></i></a>
                </p>
            </center>
            
        </div>

        <?php
               }

            echo '</div>';

         } else {

            echo '<div class="callout warning">
                     <h2>Belum Ada Calon Ketua</h2>
                  </div>';
         }

         echo '</div>';
         ?>

    

        <center><h2>KANDIDAT CALON RT ASGARD</h2></center>
    <div class="row">
        <div class="col-md-6">
            <center><h3>CALON 01</h3>
                <img src="../assets/img/default.png" class="img-responsive img-thumbnail" />
                <p><h5><strong>NAMA CALON RT</strong></h5></p>
                <p>
               <a href="#" class="btn btn-primary" >Lihat Visi Misi <i class="glyphicon glyphicon-play"></i></a>
                </p>
                <p>
               <a href="#" class="btn btn-danger" >Beri Suara<i class="glyphicon glyphicon-play"></i></a>
                </p>
            </center>
            
        </div>

        <div class="col-md-6">
             <center><h3>CALON 02</h3>
                <img src="../assets/img/default.png" class="img-responsive img-thumbnail" />
                <p><h5><strong>NAMA CALON RT</strong></h5></p>
                <p>
               <a href="#" class="btn btn-primary" >Lihat Visi Misi <i class="glyphicon glyphicon-play"></i></a>
                </p>
                <p>
               <a href="#" class="btn btn-danger" >Beri Suara<i class="glyphicon glyphicon-play"></i></a>
                </p>
            </center>
        </div>
      </div>

    </div>

    

 
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</body>
</html>