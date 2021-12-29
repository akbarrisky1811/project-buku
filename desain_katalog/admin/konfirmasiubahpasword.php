<?php
session_start();
include('../koneksi/koneksi.php');
if(isset($_SESSION['id_user'])){
    $id_user = $_SESSION['id_user'];
        $passla = $_POST['Lama'];
        $passba = $_POST['Baru'];
        $passkonfir = $_POST['Konfirmasi'];

        if (empty($passla)){
            header("Location:ubahpassword.php?notif=editkosong&jenis=Lama");
        }else if(empty($passba)){
            header("Location:ubahpassword.php?notif=editkosong&jenis=Baru");
        }else if (empty($passkonfir)){
            header("Location:ubahpassword.php?notif=editkosong&jenis=Konfirmasi");
        }else {
            $sql_d = "select `password` from `user` where `id_user` = '$id_user'";
            $query_d = mysqli_query($koneksi, $sql_d);
            while($data_d = mysqli_fetch_row($query_d)){
                $password = $data_d[0];
            }
            $pass = MD5($passkonfir);
            $passb = MD5($passba);
            if(MD5($passla) == $password){
                if($pass == $passb){
                $sql = "UPDATE `user` set `password`='$pass' where `id_user`='$id_user'"; //echo $sql;
                mysqli_query($koneksi,$sql);
                header("Location:ubahpassword.php?notif=editberhasil");
                } else {
                    header("Location:ubahpassword.php?notif=tidaksama");
                }
            } else {
                header("Location:ubahpassword.php?notif=tidaksesuai");
            }
            
        }
    }
?>