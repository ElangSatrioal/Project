<?php
error_reporting(0);
include 'db.php'; 
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
<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
<link href="fontawesome/css/all.css" rel = "stylesheet">

</head>  
<body>
    <header class="user">
        <div class = "container">
    <h1><a href = "landing.html">AlamIndonesia</a></h1>
    <ul>
        <li><a href="index.php" >Reset</a></li>
    </ul>
</div>
</header>
     <!--- search --->
     <div class = "search">
        <div class = "container">
            <form action = "wisata.php"> 
                <input type="text" name = "search" placeholder = "Telusuri" value = "<?php echo $_GET['search']?>" autocomplete = "off">
                <input id = "cari" type="submit" name = "cari" >
                <label for="cari" class = "cari "><i class="fa-solid fa-magnifying-glass"></i>  Cari </label>
            </form>
        </div>
     </div>

      <!--- kategori --->
      <div class = "section">
            <div class = "container">
                <h3 class = "kategori-wisata">Kategori</h3>
                <div class = "box">
                    <?php 
                    $kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori ASC");
                    if(mysqli_num_rows($kategori) > 0){
                        while($k = mysqli_fetch_array($kategori)){
                    ?>
                    <a href="wisata.php?kat=<?php echo $k['id_kategori'] ?>">
                       <div class = "col-5">
                           <img src="ikon kategori.png" width = "40px" style="margin-bottom:5px;">
                           <p><?php echo $k['nama_kategori']?></p>
                       </div>
                    </a>
                <?php }} else{?>
                    <p>Tidak Ada Kategori</p>
                    <?php } ?>
                </div>
            </div>
        </div>


        <!--- wisata --->

        <div class="section">
            <div class="container">
                <h3 class = "daftar-wisata2">Daftar Wisata</h3>
                <div class="box">
                    <?php 
                    if($_GET['search'] != '' || $_GET['kat'] != ''){
                        $where = " AND ( nama_wisata LIKE '%".$_GET['search']."%' OR deskripsi LIKE '%".$_GET['search']."%' OR username LIKE '%".$_GET['search']."%' ) 
                        AND id_kategori LIKE '%".$_GET['kat']."%' ";
                    }
                    $wisata = mysqli_query($koneksi, "SELECT * FROM tempat_wisata  LEFT JOIN adminbiro USING (id_admin) WHERE status_wisata = 1  $where  ORDER BY id_wisata ASC ");
                    if(mysqli_num_rows($wisata) > 0){
                        while($p = mysqli_fetch_array($wisata)){
                    ?>
                    <a href="detail-wisata.php?id=<?php echo $p['id_wisata']?>">
                    <div class="col-4">
                        <img src="wisata/<?php echo $p['gambar']?>">
                        <p class="nama"><?php echo $p['nama_wisata']?></p>
                        <p class = "nama-biro"> <?php echo $p['username']?></p>
                        <p class = "harga">Rp. <?php echo number_format($p['tarif']) ?></p>
                    </div>
                    </a>
                    <?php }}else{ ?>
                        <p>Tidak Ada Hasil Untuk  "<?php echo $_GET['search']?>"</p>
                        <?php } ?>    
                    </div>
            </div>
        </div>
        <!--- footer --->
        <div class = "footer">
            <div class = "footer-container">
                
        <div class="footer-column">
           <h2 class = "title-footer">Hubungi Kami</h2>
           <h3 class = "footer-menu"><i class="fa-solid fa-phone"></i> No telp</h3>
           <p>0822-3343-8134</p>

           <h3 class = "footer-menu"><i class="fa-solid fa-envelope"></i> Email</h3>
           <p>elangsatrioalalyyu@gmail.com</p>

           <h3 class = "footer-menu"><i class="fa-solid fa-location-dot"></i> Alamat</h3>
           <p>Bluru Permai CJ No : 7</p>

       </div>

       <div class="footer-column">
           <h2 class = "title-footer">Sosial Media</h2>
           <h3 class = "footer-menu"><i class="fa-brands fa-instagram"></i> Instagram</h3>
           <a href=""><p>elngsa.a</p></a>
            
           <h3 class = "footer-menu"><i class="fa-brands fa-square-facebook"></i> Facebook</h3>
           <a href=""><p>ElangSatrioal</p></a>

           <h3 class = "footer-menu"><i class="fa-brands fa-youtube"></i> Youtube</h3>
           <a href=""><p>E l g.</p></a>
       </div>

       <div class="footer-column">
           <h2 class = "title-footer">Partisipasi</h2>
           <h3 class = "footer-menu"><i class="fa-brands fa-figma"></i></i> Figma</h3>
           <h3 class = "footer-menu"><i class="fa-solid fa-robot"></i> ChatGPT</h3>
           <h3 class = "footer-menu"><i  class = "fa-brands fa-font-awesome"></i> Font Awesome</h3>
           <h3 class = "footer-menu"><i class="fa-brands fa-youtube"></i> Dzulfikar Nurfikri</h3>
        </div>

        <div class="footer-column">
        <h2 class = "title-footer">Tentang</h2>
           <h3 class = "footer-menu">Pesan</h3>
           <p> Gunakan Website Dengan Bijak dan Buat Pengalaman yang Menyenangkan</p>
           <small class = "copy">Copyright &copy; 2023 - AlamIndonesia.</small>
        </div>


           </div>
       </div>
</body>
</html>