<?php
include "koneksi.php";
include "class.php";

$datakota = query("select * from data_kota")['data'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
<title>Irfan.co.id</title>
<meta name="description" content="Irfan.co.id - Menyediakan layanan gratis API & Tools Gratis Seperti Cek Mutasi, Cek Nama Rekening, Hadist, Tools Dropship gratis, dan masih banyak lagi">
<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article" />
<meta property="og:title" content="Irfan.co.id - Layanan Tools Gratis" />
<meta property="og:description" content="Irfan.co.id - Menyediakan layanan gratis API & Tools Gratis Seperti Cek Mutasi, Cek Nama Rekening, Hadist, Tools Dropship gratis, dan masih banyak lagi" />
<meta property="og:url" content="https://irfan.co.id" />
<meta property="og:image" content="https://irfan.co.id/https://irfan.co.id/assets/images/logo.svg" />
<meta property="og:image:secure_url" content="https://irfan.co.id/https://irfan.co.id/assets/images/logo.svg" />
<meta property="og:image:width" content="300" />
<meta property="og:image:height" content="200" />    <!-- plugins:css -->
    <link rel="stylesheet" href="https://irfan.co.id/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://irfan.co.id/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="https://irfan.co.id/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="https://irfan.co.id/assets/images/favicon.png" />

<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modals {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modals-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 60%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modals-header {
  padding: 5px 16px;
  background-color: #5cb85c;
  color: white;
}

.modals-body {padding: 2px 16px;}

.modals-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
</style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href=""><img src="https://irfan.co.id/assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href=""><img src="https://irfan.co.id/assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
          <li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#ui-ekoji2" aria-expanded="false" aria-controls="ui-ekoji2">
    <span class="menu-title">Daftar Menu</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="ui-ekoji2">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"> <a class="nav-link" href="index.php">Daftar Jalur</a></li>
    </ul>
  </div>
</li>
</ul>        </nav>

<!-- Modal content -->
<div id="myModal" class="modals">
  <div class="modals-content">
    <div class="modals-header">
      <span id="close" class="close">&times;</span>
      <h2>Result</h2>
    </div>
    <div class="modals-body">
      <p id="respon"></p>
    </div>
    <div class="modals-footer">
    </div>
  </div>
</div>

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Ekoji Travel </h3>
            </div>
			<div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4>Cari Jalur Terdekat</h4>
                    <!-- <center><p id="respon"></p></center> -->
                    
                        <form method="POST" name="form-setting" id="form-setting">

                            <div class="form-group row">
                              <div class="col">
                                  <label>Kota Keberangkatan</label>
                                  <select name="keberangkatan" class="form-control">
                                    <?php
                                    foreach($datakota as $kota) {
                                      echo "<option value='".$kota['nama_kota']."'>".$kota['nama_kota']."</option>";
                                    }
                                    ?>
                                  </select>
                              </div>
                              <div class="col">
                                  <label>Kota Tujuan</label>
                                  <select name="tujuan" class="form-control">
                                    <?php
                                    foreach($datakota as $kota) {
                                      echo "<option value='".$kota['nama_kota']."'>".$kota['nama_kota']."</option>";
                                    }
                                    ?>
                                  </select>
                              </div>
                              </div>
                                                    
                            <div class="form-group">
                                <button type="submit" id="kirim" class="btn btn-gradient-primary mr-2">Cari</button>
                            </div>
                        </form>
                        
                        <script src="https://irfan.co.id/assets/js/jquery-1.4.2.min.js"></script>
                        
                        <script>
                            $("#kirim").click(function(){
                                $('#respon').html("Sedang Proses");
                                $.ajax({
                                    url: "proses-jalur.php",
                                    type: "post",
                                    data: $("form#form-setting").serialize(),
                                    success: function (response) {
                                        $('#respon').html(response);
                                        var modal = document.getElementById("myModal");
                                        modal.style.display = "block";
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        console.log(textStatus, errorThrown);
                                    }
                                });
                                $('html, body').animate({ scrollTop: 0 }, 0);
                                //nice and slow :)
                                $('html, body').animate({ scrollTop: 0 }, 'slow');
                                return false;
                            });
                            $("#close").click(function(){
                                var modal = document.getElementById("myModal");
                                modal.style.display = "none";
                            });
                            window.onclick = function(event) {
                                var modal = document.getElementById("myModal");
                                if (event.target == modal) {
                                    modal.style.display = "none";
                                }
                            }
                        </script>

                    </div>
                    </div>
                </div>  
                <style>
#tabel-instruktur {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  text-align-last: center;
}

#tabel-instruktur td, #tabel-instruktur th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tabel-instruktur tr:nth-child(even){background-color: #f2f2f2;}

#tabel-instruktur tr:hover {background-color: #ddd;}

#tabel-instruktur th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
                <div class="card">
                    <div class="card-body">
                        <h2>Data Jalur</h2>
                        <div style="overflow-x:auto;">
                        <table id="tabel-instruktur">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Dari Kota</th>
                                    <th>Ke kota</th>
                                    <th>Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($datakota as $kota) {
                                      $pajak[$kota['nama_kota']] = $kota['pajak'];
                                    }
                                    $query = query("select * from jalur");
                                    $i = 1;
                                    foreach ( $query['data'] as $get ) {
                                        echo "<tr>
                                            <td>".$i."</td>
                                            <td>".$get['dari']." (Pajak ".$pajak[$get['dari']].")</td>
                                            <td>".$get['ke']." (Pajak ".$pajak[$get['ke']].")</td>
                                            <td>".$get['biaya']."</td>
                                        </tr>";
                                        $i++;
                                    }
                                ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>   

            </div>

            
            
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
     
    <script src="https://irfan.co.id/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="https://irfan.co.id/assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="https://irfan.co.id/assets/js/off-canvas.js"></script>
    <script src="https://irfan.co.id/assets/js/hoverable-collapse.js"></script>
    <script src="https://irfan.co.id/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="https://irfan.co.id/assets/js/dashboard.js"></script>
    <script src="https://irfan.co.id/assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>