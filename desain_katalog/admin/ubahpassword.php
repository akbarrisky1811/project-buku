<!DOCTYPE html>
<html>
<head>
<?php include("includes/head.php") ?> 
<?php 
  include ('../koneksi/koneksi.php');
  session_start();
  if(isset($_SESSION['id_user'])){
    $id_user = $_SESSION['id_user'];
    $sql_d = "select `password` from `user` where `id_user` = '$id_user'";
    $query_d = mysqli_query($koneksi, $sql_d);
    while($data_d = mysqli_fetch_row($query_d)){
      $password = $data_d[0];
    }
  } else {
    header("Location:index.php");
  }
?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php include("includes/header.php") ?>

  <?php include("includes/sidebar.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-lock"></i> Ubah Password</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Ubah Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Pengaturan Password</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form class="form-horizontal" method="post" action="konfirmasiubahpasword.php">
        <div class="card-body">
          <h6>
          <?php 
            if(!empty($_GET['notif'])){
              if($_GET['notif']=="editberhasil"){?>
                <div class="alert alert-success" role="alert">Password berhasil dirubah</div>
            <?php }
            }
          ?>
          <?php 
            if(!empty($_GET['notif'])){
              if($_GET['notif']=="tidaksesuai"){?>
                <div class="alert alert-danger" role="alert">Maaf Pasword Lama Anda salah</div>
            <?php }
            }
          ?>
          <?php 
            if(!empty($_GET['notif'])){
              if($_GET['notif']=="tidaksama"){?>
                <div class="alert alert-danger" role="alert">Maaf Konfirmasi password baru tidak sesuai</div>
            <?php }
            }
          ?>
            <i class="text-blue"><i class="fas fa-info-circle"></i> Silahkan memasukkan password lama dan password baru Anda untuk mengubah password.</i>
          </h6><br>
          
          <?php ?>
          <div class="form-group row">
            <label for="pass_lama" class="col-sm-3 col-form-label">Password Lama</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="pass_lama" name="Lama" value="">
              <!--<span class="text-danger">Mohon maaf, password lama wajib diisi.</span>-->
            </div>
          </div>
          <div class="form-group row">
            <label for="pass_baru" class="col-sm-3 col-form-label">Password Baru</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="pass_baru" name="Baru" value="">
              <!--<span class="text-danger">Mohon maaf, password baru wajib diisi.</span>-->
            </div>
          </div>
          <div class="form-group row">
            <label for="konfirmasi" class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="konfirmasi" name="Konfirmasi" value="">
            </div>
          </div>
        </div>
        <?php 
        if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){
          if($_GET['notif']=="editkosong"){?>
            <div class="alert alert-danger" role="alert">Maaf Pasword <?php echo $_GET['jenis'];?> Wajib di isi !</div>
         <?php }
        }
      ?>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("includes/footer.php") ?>

</div>
<!-- ./wrapper -->

<?php include("includes/script.php") ?>
</body>
</html>
