<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="utf-8">
<meta name="viewport" content = "width-device-width , initial-scale= 1" >
<title> User Login | AlamIndonesia </title>
<link rel="stylesheet" type="text/css" href = "css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Alkatra&display=swap" rel="stylesheet">

    </head>  
<body id = "bg-login3">
    <div class = "box-login">
        <h2>User Login</h2>
        <form action = "" method = "POST">
            <input type="text" name="user" , placeholder = "Username" class="input-control", required>
            <input id="password" type="password" name="password" , placeholder = "Password" ,  class="input-control" required>
	          <input type="checkbox" id="showPassword" onchange="togglePassword('password', 'showPassword')" class = "checkbox">
	          <label for="showPassword" class = "show">Show Password</label><br>
            <input type="submit" name="submit" , value = "Login" class="btn"> <br>
        </form>
        <?php
          if(isset($_POST['submit'])){
            SESSION_start();
            include 'db.php';

            $user = mysqli_real_escape_string($koneksi,$_POST['user']);
            $pass = mysqli_real_escape_string($koneksi,$_POST['password']);

        
            $cek = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '" .$user. "'  AND password = '" .$pass. "'" );
            if(mysqli_num_rows($cek) > 0){
                echo '<script>window.location= "index.php"</script>';
            }else{
                echo "<p style= ' color: red ; font-weight : bold; font-size: 12px ; background-color:pink; border-radius : 4px; padding:5px; margin-bottom:3px;'> Password atau Username Anda Salah !</p>"; 
            }
          }

          ?>
        
        
        
        <a  class = donthave > Belum Punya Akun ? </a> <a href = "registeruser.php" , class= "buat"> Buat Akun</a>
    </div>

    <script>
        function togglePassword(passwordId, checkboxId) {
	var passwordField = document.getElementById(passwordId);
	var checkbox = document.getElementById(checkboxId);
	if (checkbox.checked) {
		passwordField.type = "text";
	} else {
		passwordField.type = "password";
	}
}
        
    </script>
</body>
</html>