<?php
include('../koneksi/koneksi.php');
$penerbit = $_POST['penerbit'];
$alamat = $_POST['alamat'];
if(empty($penerbit)){
	header("Location:tambahpenerbit.php?notif=tambahkosong");
}elseif (empty($alamat)) {
	header("Location:tambahpenerbit.php?notif=tambahkosong1");
}else{
$sql = "insert into `penerbit` (`penerbit`,`alamat`) values ('$penerbit','$alamat')";
mysqli_query($koneksi,$sql);
header("Location:penerbit.php?notif=tambahberhasil");
}
?>
