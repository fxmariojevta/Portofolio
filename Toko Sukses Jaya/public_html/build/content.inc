<?php
include 'build/kategori.inc';
?>
<div id="content">
    <div id="single">
        <h2 style="font-size: 30;text-align: center;">Buku Terbaru</h2> 
        <?php
            $database = mysqli_connect('localhost','id11991958_root','usbww','id11991958_tokobuku') or die("Ngga bisa konek, Alasan dari MySQL :".mysqli_error($mysqli)); 
            if (!$database)   die ("Ngga bisa konek, Alasan dari MySQL :".mysqli_error()); 
            $query = mysqli_query($database, "SELECT * FROM buku WHERE status = 1 ORDER BY tanggal DESC LIMIT 3");

            while ($data = mysqli_fetch_assoc($query)) {
                echo "<div id='single'>";
                echo "<h2>".$data['judul']."</h2>";
                echo "<div id='featured-image'><img src='gambar/".$data['gambar']."' width='130px'>&nbsp;</div>";
                echo "<div align='justify'>".$data['deskripsi']."</div>";
                echo "<div id='more'><a href='?b=detailbuku.php&lihat=".$data['id']."'>Baca Selengkapnya</a></div>";
                echo "</div>";
            }
        ?>
		
		</div>
	</div>