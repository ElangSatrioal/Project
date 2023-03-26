<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="utf-8">
<meta name="viewport" content = "width-device-width , initial-scale= 1" >
<title> Register | AlamIndonesia </title>
<link rel="stylesheet" type="text/css" href = "css/style.css">
    </head>  
<body id = "bg-login">
    <div class = "box-login">
        <h2>Register</h2>
        <form action = "" method = "POST">
            <input type="text" name="nama" , placeholder = "Nama Admin" class="input-control" , autocomplete="off" required>
            <input type="text" name="user" , placeholder = "Username Perusahaan" class="input-control" , autocomplete="off" required>
            <input type="text" name="notelp" , placeholder = "Nomor Telepon" class="input-control" , autocomplete="off" required>
            <input type="text" name="email" , placeholder = "Email" class="input-control" , autocomplete="off" required>
            <input type="text" name="alamat" , placeholder = "Alamat" class="input-control" , autocomplete="off" required>
            <input type="password" name="pass1" , placeholder = "Password" class="input-control" required>
            <input type="password" name="pass2" , placeholder = "Confirm Password" class="input-control" required>
            <input type="submit" name="submit" , value = "Create Account" class="btn">
        </form>
        <?php
          if(isset($_POST['submit'])){
            include 'db.php';

            $nama = $_POST['nama'];
            $user = $_POST['user']; 
            $notelp = $_POST['notelp'];
            $email = $_POST['email'];
            $alamat = $_POST['alamat'];
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];


         
         $cek_user = mysqli_query($koneksi,"SELECT * FROM admin WHERE username = '" .$user. "'" );
         $cek_login = mysqli_num_rows($cek_user);

         if ($cek_login > 0) {
            echo "<p style= ' color: red ; font-weight : bold; font-size: 12px ; background-color:pink; border-radius : 4px; padding:5px; margin-bottom:3px;'> Username Tidak Tersedia !</p>"; ;
            
         }else{
            if ($pass1 != $pass2){
                echo "<p style= ' color: red ; font-weight : bold; font-size: 12px ; background-color:pink; border-radius : 4px; padding:5px; margin-bottom:3px;'> Password Tidak Sama !</p>"; 
            
            }else{
                mysqli_query($koneksi,"INSERT INTO admin ( `nama_admin`, `username` , `no_telp`, `email` , `alamat` , `password`)VALUES( '$nama' , '$user' , '$notelp' , '$email' , '$alamat' , '$pass1' )");
                echo '<script>window.location= "dashboard.php"</script>';
            }

           }
        }
        ?>
           
          
          

    </div>
</body>
</html>