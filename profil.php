<?php
session_start();
include 'db.php';
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}
$query = mysqli_query($koneksi,"SELECT * FROM admin WHERE id_admin = '".$_SESSION['id']."' ");
$d= mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="utf-8">
<meta name="viewport" content = "width-device-width , initial-scale= 1" >
<title> AlamIndonesia </title>
<link rel="stylesheet" type="text/css" href = "css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Alkatra&display=swap" rel="stylesheet">

</head>  
<body>
    <header>
        <div class = "container">
    <h1><a href = "landing.html">AlamIndonesia</a></h1>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="profil.php">Profil</a></li>
        <li><a href="datakategori.php">Data Kategori</a></li>
        <li><a href="datawisata.php">Data Wisata</a></li>
        <li><a href="keluar.php">Log Out</a></li>
    </ul>
</div>
</header>
<div class = "section">
    <div class = "container">
        <h3> Profil </h3>
        <div class = "box">
            <form action="" method="POST">
                <input type="text" name="nama" placeholder="Nama Lengkap" class = "input-control1" value = "<?php echo  $d-> nama_admin ?>" required>
                <input type="text" name="user" placeholder="Username" class = "input-control" value = "<?php echo  $d-> username ?>" required>
                <input type="number" name="hp" placeholder="Nomor HP" class = "input-control" value = "<?php echo  $d-> no_telp ?>" required id="notelp">
                <input type="text" name="email" placeholder="Email" class = "input-control" value = "<?php echo $d-> email ?>" required>
                <input type="text" name="alamat" placeholder="Alamat" class = "input-control" value = "<?php echo  $d-> alamat ?>" required>
                <input type="submit" name="submit" , value = "Add Change" class="btn">
            </form>
            <?php
            if(isset($_POST['submit'])){

                $nama = $_POST['nama'];
                $user = $_POST['user'];
                $hp = $_POST['hp'];
                $email = $_POST['email'];
                $alamat = $_POST['alamat'];
                
                
            $update = mysqli_query($koneksi,"UPDATE admin SET
            nama_admin = '".$nama."',
            username = '".$user."',
            no_telp = '".$hp."',
            email = '".$email."',
            alamat = '".$alamat."'
            WHERE id_admin = '".$d->id_admin. "' ");
            
            if($update){
                echo '<script>alert("Profil Telah Diperbarui")</script>';
                echo '<script>window.location ="profil.php"</script>';
            }else{
                echo "Gagal" .mysqli_error($koneksi);
            }
        }
        
            ?>
        </div>
        <h3 class = "second-title"> Ubah Password </h3>
        <div class = "box">
            <form action="" method="POST">
            <input id = "password1" type="password" name="password1" , placeholder = "New Password" class="input-control1" required>
            <input type="checkbox" id="showPassword1" onchange="togglePassword('password1', 'showPassword1')" class = "checkbox">
	        <label for="showPassword1" class = "show">Show Password</label>
            <input id = "password2" type="password" name="password2" , placeholder = "Confirm New Password" class="input-control" required>
            <input type="checkbox" id="showPassword2" onchange="togglePassword('password2', 'showPassword2')" class = "checkbox" >
	        <label for="showPassword2" class = "show">Show Password</label><br>
                <input type="submit" name="submit2" , value = "Add Change" class="btn">
            </form>
            <?php
            if(isset($_POST['submit2'])){

                $pass1 = $_POST['password1'];
                $pass2 = $_POST['password2'];
                
                if ($pass1 != $pass2){
                    echo "<p style= 'margin-top : 5px ; color: red ; font-weight : bold; font-size: 12px ; background-color:pink; border-radius : 4px; padding:5px; margin-bottom:3px;'> Password Tidak Sama !</p>"; 
                
                }
                
                
            
        }
        
            ?>
        </div>
    </div>
</div>
<footer>
    <div class = "container-footer">
        <small>Copyright &copy; 2023 - AlamIndonesia.</small>
    </div>
</footer>
<script>
    // Memilih input dengan id "angka"
var inputAngka = document.getElementById("notelp");

// Menambahkan event listener ketika input berubah
inputAngka.addEventListener("input", function() {
  // Menghapus karakter yang bukan angka
  this.value = this.value.replace(/[^0-9]/g, "");

  // Memotong input menjadi maksimal 5 karakter
  if (this.value.length > 12) {
    this.value = this.value.slice(0, 12);
  }
});
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