<?php
session_start();
include 'db.php';
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
        <li><a href="dashboard2.php">Dashboard</a></li>
        <li><a href="profil.php" >Profil</a></li>
        <li><a href="datakategori.php" class = "active">Data Kategori</a></li>
        <li><a href="#" >Data Wisata</a></li>
        <li><a href="keluar.php">Log Out</a></li>
    </ul>
</div>
</header>
<div class = "section">
    <div class = "container-footer">
        <h3> Kategori </h3>
        <div class = "box">
            <p><a href="tambah-kategori.php" class = "btn-small">+ Tambah Kategori Baru</a></p>
            <table border = "1" cellspacing = "0" class= "table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th width = 150px >Action</th>
            
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    $kategori = mysqli_query($koneksi,"SELECT * FROM kategori ORDER BY id_kategori ASC");
                    while($row = mysqli_fetch_array($kategori)){
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['nama_kategori']?></td>
                        <td> 
                            <a href="edit-kategori.php?id=<?php echo $row['id_kategori'] ?>" class = "btn-small">Edit</a> || <a href="proses-hapus.php?idk=<?php echo $row['id_kategori']?>" onclick = "return confirm('Hapus Kategori ?')" class = "btn-small">Hapus</a>
                        </td>
                        
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
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