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
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel = "stylesheet">
<link href="fontawesome/css/all.css" rel = "stylesheet">
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

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
        <h3> Tambah Paket Wisata </h3>
        <div class = "box">
            <form action="" method="POST" enctype = "multipart/form-data">
                <input type="file" name = "gambar" id = "uploadbtn" required>
                <label for="uploadbtn" class = "upload"><i class="fa-solid fa-arrow-up-from-bracket"></i> Tambahkan Gambar </label>
                <select class = "input-control" name="kategori" required>
                    <option value = ""> --- Pilih Kategori Wisata Anda --- </option>
                    <?php
                    $kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori ASC");
                    while($r = mysqli_fetch_array($kategori)){

                    ?>
                    <option value= "<?php echo $r['id_kategori']?>"><?php echo $r['nama_kategori'] ?></option>
                    <?php } ?>
                </select>
                <input type="text" name = "nama" class = "input-control" placeholder = "Nama Paket Wisata" id = "myInput" maxlength="25" required>
                <input type="number" name = "tarif" class = "input-control" placeholder = "Tarif" oninput="formatNumber(this)" required>
                <textarea class = "input-control" name = "deskripsi" placeholder = "Deskripsi"></textarea><br>
                <select class = "input-control" name = "status"> 
                    <option value=""> --- Pilih Status --- </option>
                    <option value="1">Tersedia</option>
                    <option value="0">Tidak Tersedia</option>
                </select>
                <input type="submit" name="submit" , value = "Submit" class="btn">
            </form>
            <?php
            if(isset($_POST['submit'])){
                //print_r($_FILES['gambar'])
                //menampung inputan form
                $idadmin   = $f-> id_admin;
                $kategori  = $_POST['kategori'];
                $nama      = $_POST['nama'];
                $tarif     = $_POST['tarif'];
                $deskripsi = $_POST['deskripsi'];
                $status    = $_POST['status'];

                //menampung data file yang diupload
                $filename = $_FILES['gambar']['name'];
                $tmp_name = $_FILES['gambar']['tmp_name'];

                $type1 = explode('.',$filename);
                $type2 = $type1[1];

                $newname = 'wisata'.time().'.'.$type2;


                //menampung format file yg diizinkan
                $tipe_diizinkan = array('jpg','jpeg','png','gif');

                //validasi format file
                if( !in_array($type2,$tipe_diizinkan)){
                    //jika format file tidak ada didalam tipe yg diizinkan
                    echo "<p style= ' color: red ; font-weight : bold; font-size: 12px ; background-color:pink; border-radius : 4px; padding:5px; margin-bottom:3px;'> 
                    Format File Tidak DIizinkan !</p>";
                }else{
                    //jika format file sesuai denga array yg diizinkan
                    //proses upload file sekaligus insert ke database
                    move_uploaded_file($tmp_name, './wisata/'.$newname);

                    $insert = mysqli_query($koneksi , "INSERT INTO tempat_wisata VALUES (
                        null,
                        '".$idadmin."',
                        '".$kategori."',
                        '".$nama."',
                        '".$tarif."',
                        '".$deskripsi."',
                        '".$newname."',
                        '".$status."',
                        null
                        
                    )");
                    if($insert){
                        echo '<script>alert("Wisata Baru Telah Ditambahkan !")</script>';
                        echo '<script>window.location="data-wisata.php"</script>';
                    }else{
                        echo "Gagal".mysqli_error($koneksi);
                    }
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