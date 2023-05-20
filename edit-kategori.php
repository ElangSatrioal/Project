<?php
session_start();
include 'db.php';
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}
$kategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori = '".$_GET['id']."' ");
if(mysqli_num_rows($kategori) == 0){
    echo '<script>window.location = "datakategori.php"</script>';
}
$k = mysqli_fetch_object($kategori);
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

</head>  
<body>
    <header>
        <div class = "container">
    <h1><a href = "landing.html">AlamIndonesia</a></h1>
    <ul>
        <li><a href="dashboard2.php" >Dashboard</a></li>
        <li><a href="profil.php" >Profil</a></li>
        <li><a href="datakategori.php" class = "active">Data Kategori</a></li>
        <li><a href="keluar.php" >Log Out</a></li>
    </ul>
</div>
</header>
<div class = "section">
    <div class = "container">
        <h3> Edit Kategori </h3>
        <div class = "box">
            <form action="" method="POST">
                <input type="text" name="nama" placeholder="Edit Nama Kategori" class = "input-control1" id = "myInput" value = "<?php echo $k -> nama_kategori ?>"required>
                <input type="submit" name="submit" , value = "Submit" class="btn">
            </form>
            <?php
            if(isset($_POST['nama'])){
            
                $nama = ucwords($_POST['nama']);

                $update = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori = '".$nama."' WHERE id_kategori = '".$k -> id_kategori."' ");

                if($update){
                    echo '<script>alert("Edit Kategori Berhasil !")</script>';
                    echo '<script>window.location="datakategori.php"</script>';
                }else{
                    echo "Gagal".mysqli_error($koneksi);
                }

            }
            ?>
            
        </div>
        </div>
    </div>
</div>
<footer>
    <div class = "container-footer">
        <small>Copyright &copy; 2023 - AlamIndonesia.</small>
    </div>
</footer>

<script>
  var input = document.getElementById("myInput");
  input.addEventListener("input", function() {
    var words = input.value.split(" ");
    for (var i = 0; i < words.length; i++) {
      words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
    }
    input.value = words.join(" ");
  });
</script>

</body>
</html>