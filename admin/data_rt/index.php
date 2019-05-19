<?php
if (!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

if (isset($_GET['action'])) {

   switch ($_GET['action']) {
      case 'tambah':
         include('./data_rt/add.php');
         break;

      case 'edit':
         include('./data_rt/edit.php');
         break;

      case 'hapus':

         if (isset($_GET['id'])) {

            $id_kelas   = strip_tags(mysqli_real_escape_string($con, $_GET['id']));

            $sql        = $con->prepare("DELETE FROM t_kelas WHERE id_kelas = ?");
            $sql->bind_param('s', $id_kelas);
            $sql->execute();

            header('location: ?page=data_rt');

         } else {

            header('location: ./');

         }

         break;
      default:
         include('./data_rt/list.php');
         break;
   }

} else {

   include('./data_rt/list.php');

}
?>
