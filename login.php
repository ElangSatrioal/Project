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
            <input type="text" name="user" , placeholder = "Username Perusahaan" class="input-control", >
            <input type="password" name="pass" , placeholder = "Password" class="input-control">
            <input type="submit" name="submit" , value = "Login" class="btn"> <br>
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
                echo "<p style= ' color: red ; font-weight : bold; font-size: 12px ; background-color:pink; border-radius : 4px; padding:5px; margin-bottom:3px;'> Password atau Username Anda Salah !</p>"; 
            }
          }
         ?>
            <a href = "register.php" , class = donthave > Belum Punya Akun ? </a> <br>
          
          

    </div>
</body>
</html>