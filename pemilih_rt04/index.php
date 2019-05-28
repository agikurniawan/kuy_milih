<?php
define('BASEPATH', dirname(__FILE__));
session_start();

if (isset($_SESSION['siswa'])) {
   header('location:./milih.php');
}

if (isset($_POST['submit'])) {

   require('../include/connection.php');

   $nis     = $_POST['nik'];
   $thn     = date('Y');
   $dpn     = date('Y') + 1;
   $periode = $thn.'/'.$dpn;

   $cek = $con->prepare("SELECT * FROM t_hasil_pemilih_rt WHERE nis = ? && periode = ?") or die($con->error);
   $cek->bind_param('ss', $nis, $periode);
   $cek->execute();
   $cek->store_result();

   if ($cek->num_rows() > 0) {

      echo '<script type="text/javascript">alert("Anda sudah memberikan suara");</script>';

   } else {

      $sql = $con->prepare("SELECT * FROM t_pemilih WHERE id_pemilih = ? && pemilih = 'Y'") or die($con->error);
      $sql->bind_param('s', $nis);
      $sql->execute();
      $sql->store_result();

      if ($sql->num_rows() > 0 ) {
         $sql->bind_result($id, $user, $kelas, $jk, $pemilih);
         $sql->fetch();

         $_SESSION['siswa'] = $id;

         header('location:./milih.php');

      } else {

         echo '<script type="text/javascript">alert("Anda tidak berhak memberikan suara");</script>';

      }

   }

}


?>
<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <title>Kuy ~ Milih</title>
            <link rel="stylesheet" href="../assets/css/bootstrap.min.css"/>
            <link rel="stylesheet" href="../assets/css/custom.css"/>
            
      </head>
      <body>
            <div class="container">
                  <div class="row">
                        <div class="col-md-12">
                        <?php
                        if (isset($_GET['page'])) {
                        switch ($_GET['page']) {
                              case 'thanks':
                              include('./thanks.php');
                              break;

                              default:
                              include('./form.php');
                              break;
                        }
                        } else {
                        include('./login.php');
                        }
                        ?>

                              
                        </div>
                  </div>
            </div>
            <script type="text/javascript" src="./assets/js/jquery-2.2.3.min.js"></script>
            <script type="text/javascript" src="./assets/js/jquery-cycle.min.js"></script>
            
      </body>
</html>
