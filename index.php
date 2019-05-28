<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/dp.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/demo.css">
	 <link rel="stylesheet" href="./assets/css/footer-basic-centered.css">
    <link rel="stylesheet" href="./assets/css/home.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
      <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header" style="height:100px;">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <a class="navbar-brand" > <img src="./assets/img/logo.jpg" alt="" style="height:100px;width:200px;"> </a>
              
            </div>
            <div id="navbar" class="navbar-collapse collapse" style="margin-top:50px;">
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

       
 
      </div>

    </div>

      <div class="slider" style="padding-bottom:400px;">
  <input type="radio" name="slider" title="slide1" checked="checked" class="slider__nav"/>
  <input type="radio" name="slider" title="slide2" class="slider__nav"/>
  <input type="radio" name="slider" title="slide3" class="slider__nav"/>
  <input type="radio" name="slider" title="slide4" class="slider__nav"/>
  <div class="slider__inner" style="padding-bottom:500px;">
    <div class="slider__contents"><i class="slider__image fa fa-codepen"></i>
      <h2 class="slider__caption">PEMILIHAN RT</h2>
      <p class="slider__txt">Gunakan hak suara anda untuk memilih RT dan RW, untuk masa depan Rukun Tetangga dan Warga lebih baik!</p>
    </div>
    <div class="slider__contents"><i class="slider__image fa fa-newspaper-o"></i>
      <h2 class="slider__caption">newspaper-o</h2>
      <p class="slider__txt">Lihat hasil real count nya disini</p>
    </div>
    <div class="slider__contents"><i class="slider__image fa fa-television"></i>
      <h2 class="slider__caption">television</h2>
      <p class="slider__txt">Pantau jangan sampai ada kecurangan dintara kita</p>
    </div>
    <div class="slider__contents"><i class="slider__image fa fa-diamond"></i>
      <h2 class="slider__caption">diamond</h2>
      <p class="slider__txt">Pemimpin yang bersinar adalah pilihan anda</p>
    </div>
  </div>
</div>

    <?php 
   include('./external/footer.php');    
      ?>
      
 
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/jquery-2.2.3.min.js"></script>
  </body>
</html>