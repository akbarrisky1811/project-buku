<?php include('../koneksi/koneksi.php');
       
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $level = $_POST['jurusan'];
    
    
        $namafile = $_FILES['foto']['name'];
        $tmpName = $_FILES['foto']['tmp_name'];
        
        if(empty($nama)){
            header("Location:tambahuser.php?notif=tambahkosong&jenis=nama");
        } else if (empty($email)){
            header("Location:tambahuser.php?notif=tambahkosong&jenis=email");
        }  else if (empty($username)){
            header("Location:tambahuser.php?notif=tambahkosong&jenis=username");
        } else if(empty($password)){
            header("Location:tambahuser.php?notif=tambahkosong&jenis=password");
        } else {
            move_uploaded_file($tmpName,'foto/'.$namafile);
            $sql = "INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `level`, `foto`) 
            VALUES (NULL, '$nama', '$email', '$username', '$password', '$level', '$namafile');";
            mysqli_query($koneksi, $sql);
            header("Location:user.php?notif=tambahberhasil");

        }
    }    
?>