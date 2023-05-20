<?php
include 'db.php';
if(isset($_GET['idk'])){
    $delete = mysqli_query($koneksi, "DELETE  FROM kategori WHERE id_kategori = '".$_GET['idk']."' ");
    echo '<script>window.location = "datakategori.php"</script>';
}

if(isset($_GET['idp'])){
    $wisata = mysqli_query($koneksi, "SELECT gambar FROM tempat_wisata WHERE id_wisata = '".$_GET['idp']."' ");
    $p = mysqli_fetch_object($wisata);

    unlink('./wisata/'.$p->gambar);

    $delete = mysqli_query($koneksi, "DELETE FROM tempat_wisata WHERE id_wisata = '".$_GET['idp']."' ");
    echo '<script>window.location = "data-wisata.php"</script>';
}
?>