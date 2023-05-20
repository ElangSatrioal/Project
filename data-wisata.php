<?php
session_start();
include 'db.php';
if($_SESSION['status_login'] != true){
    echo '<script>window.location="loginbiro.php"</script>';
}
$query = mysqli_query($koneksi,"SELECT * FROM adminbiro WHERE id_admin = '".$_SESSION['id']."' ");
$f= mysqli_fetch_object($query);
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


</head>  
<body>
    <header>
        <div class = "container">
    <h1><a href = "landing.html">AlamIndonesia</a></h1>
    <ul>
        <li><a href="dashboardbiro2.php">Dashboard</a></li>
        <li><a href="profilbiro.php" >Profil</a></li>
        <li><a href="data-wisata.php" class = "active" >Data Wisata</a></li>
        <li><a href="keluarbiro.php">Log Out</a></li>
    </ul>
</div>
</header>
<div class = "section">
    <div class = "container">
        <h3> Paket Wisata Anda </h3>
        <div class = "box">
            <p><a href="tambah-wisata.php" class = "btn-small">+ Tambah Paket Wisata</a></p>
            <table border = "1" cellspacing = "0" class= "table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Nama Wisata</th>
                        <th>Tarif</th>
                        <th width = "100px">Gambar</th>
                        <th>Status</th>
                        <th width = 160px >Action</th>
            
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    $wisata = mysqli_query($koneksi,"SELECT * FROM tempat_wisata LEFT JOIN kategori USING (id_kategori) WHERE id_admin = '".$f->id_admin."' ORDER BY id_wisata ASC ");
                    if(mysqli_num_rows($wisata) > 0){
                    while($row = mysqli_fetch_array($wisata)){
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['nama_kategori']?></td>
                        <td><?php echo $row['nama_wisata']?></td>
                        <td><?php echo $row['tarif']?></td>
                        <td><a href= "wisata/<?php echo $row['gambar'] ?>" target = "_blank"><img  src = "wisata/<?php echo $row['gambar'] ?>" width = "80px" style="border-radius:5px;"></a></td>
                        <td><?php echo ($row['status_wisata'] == 0 )? 'Tidak Tersedia':'Tersedia';?></td>
                        <td height="23px"> 
                            <a href="edit-wisata.php?id=<?php echo $row['id_wisata'] ?>" class = "btn-small"><i class="fa-solid fa-pen-to-square"></i> Edit</a> || 
                            <a href="proses-hapus.php?idp=<?php echo $row['id_wisata']?>" onclick = "return confirm('Hapus Paket Wisata ?')" class = "btn-small"><i class="fa-solid fa-trash"></i> Hapus</a>
                        </td>
                        
                    </tr>
                    <?php }} else{ ?>
                        <tr>
                            <td colspan = "8">Tidak Ada Paket Wisata</td>
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