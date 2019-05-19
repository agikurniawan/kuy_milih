<?php
if (!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

if (isset($_GET['action'])) {

   switch ($_GET['action']) {
      case 'tambah':
         include('./rw/add.php');
         break;

      case 'edit':
         include('./rw/edit.php');
         break;

      case 'view':
         include('./rw/view.php');
         break;

      case 'hapus':

         if (isset($_GET['id'])) {

            $id   = $_GET['id'];

            $sql   = $con->prepare("SELECT foto FROM t_calon_rw WHERE id_rw = ?");
            $sql->bind_param('s', $id);
            $sql->execute();
            $sql->store_result();
            $sql->bind_result($f);
            $sql->fetch();
            unlink('../assets/img/rw/'.$f);

            $sql   = $con->prepare("DELETE FROM t_calon_rw WHERE id_rw = ?");
            $sql->bind_param('s', $id);
            $sql->execute();

            header('location: ?page=rw');

         } else {

            header('location: ./');

         }

         break;
      default:
         include('./rw/list.php');
         break;
   }

} else {

   include('./rw/list.php');

}
?>
