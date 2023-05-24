<?php
session_start();
if($_SESSION['status_login'] != true){
    echo '<script>window.location="loginbiro.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="utf-8">
<meta name="viewport" content = "width=device-width , initial-scale= 1" >
<title> AlamIndonesia </title>
<link rel="stylesheet" type="text/css" href = "css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Alkatra&display=swap" rel="stylesheet">
<link href="fontawesome/css/all.css" rel = "stylesheet">
<style>
    h4{
    font-size: 30px;
        
    }

    .box{
       width: 1186px;
       height: 375px;
        
    }

    h4{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 90px;
        margin-bottom:50px;
    }

    .btn-start{
        font-size: 18px;
        border-radius: 30px;
        justify-content: center;
        align-items: center;
        margin:30px;
        background-color: #40513B;
        color:#Fff;
        transition: 0.5s;
        margin-left:525px;
        font-weight: bold;
    }

    a{
        padding:15px 20px;
    }

    .btn-start:hover{
        color:#40513B;
        background-color: #ABC35C;
    } 
</style>

</head>  
<body>
    <header>
        <div class = "container">
    <h1><a href = "landing.html">AlamIndonesia</a></h1>
    <ul>
        <li><a href="dashboardbiro2.php" class = "active">Dashboard</a></li>
        <li><a href="profilbiro.php" >Profil</a></li>
        <li><a href="data-wisata.php" >Data Wisata</a></li>
        <li><a href="keluarbiro.php">Log Out</a></li>
    </ul>
</div>
</header>
<div class = "section">
    <div class = "container">
        <h3> Dashboard </h3>
        <div class = "box">
            <h4> Selamat Datang !<br>Admin <?php echo $_SESSION['a_global'] -> username ?> Di AlamIndonesia</h4>
            <p><a href="data-wisata.php" class = "btn-start">Start Now</a></p>
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