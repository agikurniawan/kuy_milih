<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Voting | Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../assets/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../assets/Ionicons/css/ionicons.min.css">
    <style>
      .box {
        padding: 30px;
      }
      img.rw {
        width:250px;
        height: 230px;
      }
      img.rt {
        width:250px;
        height: 230px;
      }
      .suara {
        position: absolute;
        right: 20px;
        bottom: 120px;
      }
    </style>
  </head>
  <body>
    

      <div class="text-right"><button id="save-img" class="btn btn-success">Simpan Grafik</button></div>
<div style="font-size:18px;">
   <canvas id="canvas"></canvas>
</div>

    <!-- jQuery 2.2.3 -->
    <script src="../assets/js/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/js/app.min.js"></script>

    <script type="text/javascript" src="../assets/js/chart-bundle.js"></script>
    <script type="text/javascript" src="../assets/js/utils.js"></script>
    <script type="text/javascript" src="../assets/js/FileSaver.min.js"></script>
    <script type="text/javascript" src="../assets/js/canvas-toBlob.js"></script>

    <script type="text/javascript">
    // slideToggle()
    $(document).ready(function() {
      $(".dropdown-toggle").click(function() {
          $(this).parent().find(".dropdown-menu").slideToggle();
      });
      $("#menu-toggle").click(function() {
          $(this).parent().find(".menu").slideToggle();
      });
    });

    $("#save-img").click(function(){
      $('#canvas').get(0).toBlob(function(blob){
          saveAs(blob, 'chart.png');
      });
    });
    

    <?php
    require('../include/connection.php');
      $thn = date('Y');
      $dpn = date('Y') + 1;
      $periode = $thn.'/'.$dpn;
      $kan = $con->prepare("SELECT * FROM t_calon_rw WHERE periode = ?") or die($con->error);
      $kan->bind_param('s', $periode);
      $kan->execute();
      $kan->store_result();
      $numb = $kan->num_rows();
      $label = '';
      $data = '';
      for ($i = 1; $i <= $numb; $i++) {
          $kan->bind_result($id, $nama, $foto, $visi, $misi, $suara, $kandidat);
          $kan->fetch();
          $label .= "'".$nama."',";
          $data .= $suara.',';
      }
      $labels = trim($label, ',');
      $datas  = trim($data, ',');
    ?>
    var chartData = {
      labels: [
          <?php
          echo $labels;
          ?>
      ],
        datasets: [{
          type: 'bar',
          label: 'Jumlah Suara',
          borderColor: window.chartColors.green,
          backgroundColor: [
            window.chartColors.blue,
            window.chartColors.red,
            window.chartColors.green,
          ],
          borderWidth: 2,
          fill: false,
          data: [
            <?php
            echo $datas;
            ?>
          ]
        }],
    };
    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myMixedChart = new Chart(ctx, {
          type: 'bar',
          data: chartData,
          options: {
                responsive: true,
                title: {
                  display: true,
                  text: 'Perolehan Suara',
                  fontSize: 30
                },
                legend: {
                    labels: {
                        fontSize: 20
                    }
                },
                scales: {
                  xAxes: [{
                      ticks: {
                          fontSize:15
                      }
                  }],
                  yAxes: [{
                      ticks: {
                          fontSize:14,
                          min:0
                      }
                  }]
                }
            }
        });
    };
    
    </script>
  </body>
</html>

