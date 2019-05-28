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
    
    <link rel="stylesheet" href="../assets/css/demo.css">
	 <link rel="stylesheet" href="../assets/css/footer-basic-centered.css">
    
    <link rel="stylesheet" href="../assets/Ionicons/css/ionicons.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
      <?php
         define('BASEPATH', dirname(__FILE__));
         session_start();

         if(!isset($_SESSION['siswa'])) {
            header('location:../');
         }

         if(isset($_GET['id'])) {

            require('../include/connection.php');

            $sql = $con->prepare("SELECT * FROM t_calon_rt WHERE id_rt = ?") or die($con->error);
            $sql->bind_param('i', $_GET['id']);
            $sql->execute();
            $sql->store_result();
            $sql->bind_result($id, $nama, $foto, $visi, $misi, $suara, $periode, $kls);
            $sql->fetch();
            ?>
 
        <div class="row">
            <div class="container-fluid">
                 <center><h3>CALON RT </h3>
                <img src="../assets/img/rt/<?php echo $foto; ?>" class="img-responsive img-thumbnail" style="width:300px; hight:300px;" />
                <p><h5><strong><?php echo $nama; ?></strong></h5></p>
                <p></p>
                <button onclick="window.history.go(-1)" class="btn btn-warning">Kembali</button>
               <a href="./submit.php?id=<?php echo $id; ?>&s=<?php echo $suara; ?>" class="btn btn-danger" >Beri Suara<i class="glyphicon glyphicon-play"></i></a>
                </p>
            </center>
            <p>
            <h3><strong>Visi: </strong></h3>
            <p><h5><?php echo $visi; ?></h5></p>
            </p>

            <p>
            <h3><strong>Misi: </strong></h3>
            <p><h5><?php echo $misi; ?></h5></p>
            </p>
            </div>
        
        </div>
        <?php

         }
         ?>

          </div>
</div>
</div>

         <?php 
   include('../external/footer.php');    
      ?>

    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</body>
</html>