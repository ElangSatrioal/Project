<?php
session_start();
include 'db.php';
if($_SESSION['status_login'] != true){
    echo '<script>window.location="loginbiro.php"</script>';
}
$query = mysqli_query($koneksi,"SELECT * FROM adminbiro WHERE id_admin = '".$_SESSION['id']."' ");
$f= mysqli_fetch_object($query);

$wisata = mysqli_query($koneksi, "SELECT * FROM tempat_wisata WHERE id_wisata = '".$_GET['id']."' ");
if(mysqli_num_rows($wisata) == 0){
    echo '<script>window.location="data-wisata.php"</script>';
}
$p = mysqli_fetch_object($wisata);
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel = "stylesheet">
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<link href="fontawesome/css/all.css" rel = "stylesheet">

</head>  
<body>
    <header>
        <div class = "container">
    <h1><a href = "landing.html">AlamIndonesia</a></h1>
    <ul>
        <li><a href="dashboardbiro2.php" >Dashboard</a></li>
        <li><a href="profilbiro.php" >Profil</a></li>
        <li><a href="data-wisata.php" class = "active">Data Wisata</a></li>
        <li><a href="keluarbiro.php" >Log Out</a></li>
    </ul>
</div>
</header>
<div class = "section">
    <div class = "container">
        <h3> Edit Paket Wisata </h3>
        <div class = "box">
            <form action="" method="POST" enctype = "multipart/form-data">
                <img src="wisata/<?php echo $p->gambar ?>" class = "edit-photo" width = "400px" border-radius = "20px"><br>
                <input type="hidden" name = "foto" value = "<?php echo $p->gambar ?>" >
                <input type="file" name = "gambar" id = "uploadbtn">
                <label for="uploadbtn" class = "upload"><i class="fa-solid fa-arrow-up-from-bracket"></i> Ubah Gambar </label>
                <select class = "input-control" name="kategori" required>
                    <option value = ""> --- Pilih Kategori Wisata Anda --- </option>
                    <?php
                    $kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori ASC");
                    while($r = mysqli_fetch_array($kategori)){

                    ?>
                    <option value= "<?php echo $r['id_kategori']?>" <?php echo ($r['id_kategori'] == $p->id_kategori)? 'selected':''; ?>><?php echo $r['nama_kategori'] ?></option>
                    <?php } ?>
                </select>
                <input type="text" name = "nama" class = "input-control" placeholder = "Nama Paket Wisata" id = "myInput" value = "<?php echo $p->nama_wisata ?>" required maxlength="20">
                <input type="number" name = "tarif" class = "input-control" placeholder = "Tarif" value = "<?php echo $p->tarif ?>" required>
                <textarea class = "input-control" name = "deskripsi" placeholder = "Deskripsi" ><?php echo $p-> deskripsi?></textarea><br>
                <select class = "input-control" name = "status"> 
                    <option value=""> --- Pilih Status --- </option>
                    <option value="1" <?php echo ($p->status_wisata == 1)? 'selected': '';?> >Tersedia</option>
                    <option value="0" <?php echo ($p->status_wisata == 0)? 'selected': '';?> >Tidak Tersedia</option>
                </select>
                <input type="submit" name="submit" , value = "Submit" class="btn">
            </form>
            <?php
            if(isset($_POST['submit'])){
                //data inputan dr form
                $kategori  = $_POST['kategori'];
                $nama      = $_POST['nama'];
                $tarif     = $_POST['tarif'];
                $deskripsi = $_POST['deskripsi'];
                $status    = $_POST['status'];
                $foto      = $_POST['foto'];

                //data gambar
                $filename = $_FILES['gambar']['name'];
                $tmp_name = $_FILES['gambar']['tmp_name'];


                //jika admin mengganti gambar

                if($filename != ''){
                $type1 = explode('.',$filename);
                $type2 = $type1[1];

                $newname = 'wisata'.time().'.'.$type2;

                $tipe_diizinkan = array('jpg','jpeg','png','gif');

                 if(!in_array($type2,$tipe_diizinkan)){
                   //jika format file tidak ada didalam tipe yg diizinkan
                    echo "<p style= ' color: red ; font-weight : bold; font-size: 12px ; background-color:pink; border-radius : 4px; padding:5px; margin-bottom:3px;'> 
                     Format File Tidak DIizinkan !</p>";

                }else{
                    unlink('./wisata/'.$foto);
                    move_uploaded_file($tmp_name, './wisata/'.$newname);
                    $namagambar = $newname;
                }
                    

                }else{
                    //jika tidak ganti gambar
                    $namagambar = $foto;
                }

                $update = mysqli_query($koneksi, "UPDATE tempat_wisata SET 
                id_kategori = '".$kategori."',
                nama_wisata = '".$nama."',
                tarif = '".$tarif."',
                deskripsi = '".$deskripsi."',
                gambar = '".$namagambar."',
                status_wisata = '".$status."'
                WHERE id_wisata = '".$p->id_wisata."' ");

                if($update){
                    echo '<script>alert("Edit Wisata Berhasil !")</script>';
                    echo '<script>window.location="data-wisata.php"</script>';
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
   CKEDITOR.replace( 'deskripsi' );

   
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