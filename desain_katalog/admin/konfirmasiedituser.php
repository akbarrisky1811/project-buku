<?php
include('../koneksi/koneksi.php');
    if(isset($_GET['data'])){  
        $id_user = $_GET['data'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];
        
        //get foto
        $sql_f = "SELECT `foto` FROM `user` WHERE `nama` = '$id_user'";
        $query_f = mysqli_query($koneksi, $sql_f);
        while($data_f = mysqli_fetch_row($query_f)){
            $foto = $data_f[0];
            //echo foto
        }
        
        if(empty($nama)){
            header("Location:edituser.php?data=".$id_user."&notif=editkosong&jenis=nama");
        }else if(empty($email)){
            header("Location:edituser.php?data=".$id_user."notif=editkosong&jenis=email");
        }else if (empty($username)){
            header("Location:edituser.php?data=".$id_user."notif=editkosong&jenis=username");
        }else{
            $lokasi_file = $_FILES['foto']['tmp_name'];
            $nama_file = $_FILES['foto']['name'];
            $direktori = 'foto/'.$nama_file;
            if(move_uploaded_file($lokasi_file,$direktori)){
                if(!empty($foto)){
                    unlink("foto/$foto");
                }
                if(!empty($password)){
                    $sql = "UPDATE `user` set `nama`='$nama', `email`='$email', `foto`='$nama_file', 
                    `password` = '$password', `level` = '$level' where `nama`='$id_user'";
                }
                $sql = "UPDATE `user` set `nama`='$nama',`email`='$email', `foto`='$nama_file', `level` = '$level'
            where `nama`='$id_user'";//echo $sql;
            mysqli_query($koneksi,$sql);
        } else{
            if(!empty($password)){
                $sql = "UPDATE `user` set `nama`='$nama', `email`='$email', `foto`='$nama_file', 
                    `password` = '$password', `level` = '$level' where `nama`='$id_user'";
                } else {
                    
                    $sql = "UPDATE `user` set `nama`='$nama', `email`='$email', `level` = '$level'
                where `nama`='$id_user'";
                }
                //echo $sql;
                mysqli_query($koneksi,$sql);
            }
            header("Location:user.php?notif=editberhasil");
        }
    }
?>