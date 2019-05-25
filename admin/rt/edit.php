<?php
if(!isset($_SESSION['id_admin']) || !isset($_GET['id'])) {
   header('location:../');
}

$id   = $_GET['id'];
$sql  = $con->prepare("SELECT * FROM t_calon_rt WHERE id_rt = ?") or die($con->error);
$sql->bind_param('i', $id);
$sql->execute();
$sql->store_result();
$sql->bind_result($id, $nama, $foto, $visi, $misi, $suara, $periode, $kls);
$sql->fetch();
?>
<h3>Edit Data Calon</h3>
<hr />
<div class="row">
   <div class="col-md-3">
      <div class="callout text-center">
         <img src="../assets/img/rt/<?php echo $foto; ?>" class="img-responsive"/>
      </div>
   </div>
   <div class="col-md-8">
        <form action="./rt/update.php" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <input type="hidden" name="f" value="<?php echo $foto; ?>" />

            <div class="form-group">
                <label class="col-sm-3 control-label">Nama Calon</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="nama" required="Nama" value="<?php echo $nama; ?>"/>
                </div>
            </div>

            <div class="form-group">
                  <label class="col-sm-3 control-label">Foto Calon</label>
               <div class="col-md-6">
                  <input type="file" class="form-control" name="foto"/>
               </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Visi</label>
                <div class="col-md-8">
                    <textarea name="visi" class="form-control" rows="3" required="Visi"><?php echo $visi; ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Misi</label>
                <div class="col-md-8">
                    <textarea name="misi"class="form-control" rows="3" required="Misi"><?php echo $misi; ?></textarea>
                </div>
            </div>

            <div class="form-group" style="padding-top:20px;">
                <div class="col-md-8 col-md-offset-3">
                    <button type="submit" name="update" value="Update Rt" class="btn btn-success">
                        Update Rt
                    </button>
                    <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">
                        Kembali
                    </button>
                </div>
            </div>

         </form>
   </div>
</div>
