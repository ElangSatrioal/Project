<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="utf-8">
<meta name="viewport" content = "width-device-width , initial-scale= 1" >
<title> User Register | AlamIndonesia </title>
<link rel="stylesheet" type="text/css" href = "css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    </head>  
<body id = "bg-login2">
    <div class = "box-login">
        <h2>User Register</h2>
        <form action = "" method = "POST">
            <input type="text" name="nama" , placeholder = "Nama" class="input-control" , autocomplete="off" required>
            <input type="text" name="user" , placeholder = "Username" class="input-control" , autocomplete="off" required>
            <input type="text" name="notelp" , placeholder = "Nomor Telepon" class="input-control" , autocomplete="off" required>
            <input type="text" name="email" , placeholder = "Email" class="input-control" , autocomplete="off" required>
            <input type="text" name="alamat" , placeholder = "Alamat" class="input-control" , autocomplete="off" required>
            <input id = "password1" type="password" name="password1" , placeholder = "Password" class="input-control" required>
            <input type="checkbox" id="showPassword1" onchange="togglePassword('password1', 'showPassword1')" class = "checkbox">
	        <label for="showPassword1" class = "show">Show Password</label>
            <input id = "password2" type="password" name="password2" , placeholder = "Confirm Password" class="input-control" required>
            <input type="checkbox" id="showPassword2" onchange="togglePassword('password2', 'showPassword2')" class = "checkbox" >
	        <label for="showPassword2" class = "show">Show Password</label><br>
            <input type="submit" name="submit" , value = "Create Account" class="btn">
        </form>
        <?php
          if(isset($_POST['submit'])){
            SESSION_start();
            include 'db.php';

            $nama = $_POST['nama'];
            $user = $_POST['user']; 
            $notelp = $_POST['notelp'];
            $email = $_POST['email'];
            $alamat = $_POST['alamat'];
            $pass1 = $_POST['password1'];
            $pass2 = $_POST['password2'];


         
         $cek_user = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '" .$user. "'" );
         $cek_login = mysqli_num_rows($cek_user);

         if ($cek_login > 0) {
            echo "<p style= ' color: red ; font-weight : bold; font-size: 12px ; background-color:pink; border-radius : 4px; padding:5px; margin-bottom:3px;'> Username Tidak Tersedia !</p>"; ;
            
         }else{
            if ($pass1 != $pass2){
                echo "<p style= ' color: red ; font-weight : bold; font-size: 12px ; background-color:pink; border-radius : 4px; padding:5px; margin-bottom:3px;'> Password Tidak Sama !</p>"; 
            
            }else{
                mysqli_query($koneksi,"INSERT INTO user ( `nama_user`, `username` , `no_telp`, `email` , `alamat` , `password`)VALUES( '$nama' , '$user' , '$notelp' , '$email' , '$alamat' , '$pass1' )");
                echo '<script>window.location= "index.php"</script>';
            }

           }
        }
        ?>
           
          
          

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