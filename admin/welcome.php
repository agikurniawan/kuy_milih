
<div class="">
   <h3>Selamat Datang di <b style="font-size:40px;">Kuy ~ Milih</b></h3>
   <h4>RW~11</h4>
</div>


   <!-- /.col -->
   <div class="col-md-3 col-sm-6 col-xs-12" style="margin-top:50px;">
      <div class="info-box bg-lightgray">
         <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
         <div class="info-box-content">
            <span class="info-box-text">Penduduk</span>
            <?php
            require('../include/connection.php');
            $sql = mysqli_query($con, "SELECT * FROM t_pemilih");
            $count = mysqli_num_rows($sql);
            echo '<span class="info-box-number">'. $count . '</span>';
                  
            
            ?>
         </div>
         <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
   </div>

<!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-top:50px;">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Rt</span>
               <?php
                  require('../include/connection.php');
                  $sql = mysqli_query($con, "SELECT * FROM t_kelas");
                  $count = mysqli_num_rows($sql);
                  echo '<span class="info-box-number">'. $count . '</span>';
               ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

