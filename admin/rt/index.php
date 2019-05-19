<?php
if (!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

if (isset($_GET['action'])) {

   switch ($_GET['action']) {
      case 'tambah':
         include('./rt/add.php');
         break;

      case 'edit':
         include('./rt/edit.php');
         break;

      case 'view':
         include('./rt/view.php');
         break;

      case 'hapus':

         if (isset($_GET['id'])) {

            $id   = $_GET['id'];

            $sql   = $con->prepare("SELECT foto FROM t_calon_rt WHERE id_rt = ?");
            $sql->bind_param('s', $id);
            $sql->execute();
            $sql->store_result();
            $sql->bind_result($f);
            $sql->fetch();
            unlink('../assets/img/rt/'.$f);

            $sql   = $con->prepare("DELETE FROM t_calon_rt WHERE id_rt = ?");
            $sql->bind_param('s', $id);
            $sql->execute();

            header('location: ?page=rt');

         } else {

            header('location: ./');

         }

         break;
      default:
         include('./rt/list.php');
         break;
   }

} else {

   include('./rt/list.php');

}
?>
