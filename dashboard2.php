<?php
session_start();
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}
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
        <li><a href="dashboard2.php" class = "active">Dashboard</a></li>
        <li><a href="profil.php" >Profil</a></li>
        <li><a href="datakategori.php" >Data Kategori</a></li>
        <li><a href="#" >Data Wisata</a></li>
        <li><a href="keluar.php">Log Out</a></li>
    </ul>
</div>
</header>
<div class = "section">
    <div class = "container-footer">
        <h3> Dashboard </h3>
        <div class = "box">
            <h4>Selamat Datang Admin <?php echo $_SESSION['a_global'] -> username ?> Di AlamIndonesia</h4>
        </div>
    </div>
</div>
<footer>
    <div class = "container-footer">
        <small>Copyright &copy; 2023 - AlamIndonesia.</small>
    </div>
</footer>
</body>
<script>
</script>
</html>