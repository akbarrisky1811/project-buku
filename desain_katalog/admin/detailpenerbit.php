<!DOCTYPE html>
<html>
<head>
<?php include("includes/head.php")
?>
<?php
session_start();
    if(isset($_SESSION['id_user'])){
        
    } else {
        header("Location:index.php");
    }
include('../koneksi/koneksi.php');
if(isset($_GET['data'])){
    $id_penerbit = $_GET['data'];
    $_SESSION['penerbit'] = $id_penerbit;
     //get data penerbit
    $sql_p = "select `penerbit`,`alamat` from `penerbit` where `id_penerbit` = '$id_penerbit'";
     $query_p = mysqli_query($koneksi,$sql_p);
     while($data_p = mysqli_fetch_row($query_p)){
     $penerbit = $data_p[0];
     $alamat = $data_p[1];
     }
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
            <h3><i class="fas fa-user-tie"></i> Detail Data Penerbit</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="penerbit.php">Data Penerbit</a></li>
              <li class="breadcrumb-item active">Detail Data Penerbit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <a href="penerbit.php" class="btn btn-sm btn-warning float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    <tbody>                 
                      <tr>
                        <td width="20%"><strong>penerbit<strong></td>
                        <td width="80%"><?php echo $penerbit ?></td>
                      </tr>              
                      <tr>
                        <td width="20%"><strong>alamat<strong></td>
                        <td width="80%"><?php echo $alamat ?></td>
                      </tr>
                      <tr>                
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
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
