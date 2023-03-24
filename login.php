<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="utf-8">
<meta name="viewport" content = "width-device-width , initial-scale= 1" >
<title> Login | AlamIndonesia </title>
<link rel="stylesheet" type="text/css" href = "css/style.css">
    </head>  
<body id = "bg-login">
    <div class = "box-login">
        <h2>Login</h2>
        <form action = "" method = "POST">
            <input type="text" name="user" , placeholder = "Username" class="input-control">
            <input type="password" name="pass" , placeholder = "Password" class="input-control">
            <input type="submit" name="submit" , value = "Login" class="btn">
            <h5 class= "donthave" >Belum Punya Akun ?</h5>
        </form>
        <?php
          if(isset($_POST['submit'])){
            include 'db.php';

            $user = $_POST['user'];
            $pass = $_POST['pass'];

            $cek = mysqli_query($koneksi,"SELECT * FROM admin WHERE username = '" .$user. "'  AND password = '" .$pass. "'" );
            if(mysqli_num_rows($cek) > 0){
                echo '<script>window.location= "dashboard.php"</script>';
            }else{
                echo '<script>alert("Username atau Pasword Anda Salah !")</script>';

            }
          }
          
          
          ?>
    </div>
</body>
</html>