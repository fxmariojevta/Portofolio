<div id='content'>
    <center>
        <?php
            $cari = $_POST['caribuku'];
            $database = mysqli_connect('localhost','id11991958_root','usbww','id11991958_tokobuku') or die("Ngga bisa konek, Alasan dari MySQL :".mysqli_error($mysqli)); 
            if (!$database)   die ("Ngga bisa konek, Alasan dari MySQL :".mysqli_error()); 
            $result = mysqli_query ($database, "SELECT * FROM buku WHERE judul like '%$cari%' OR tahun_terbit like '%$cari%' OR penulis like '%$cari%' OR penerbit like '%$cari%' OR deskripsi like '%$cari%' AND status='1'"); 
            
            $perpage = 5;
            $query = mysqli_query ($database, "SELECT * FROM buku WHERE judul like '%$cari%' OR tahun_terbit like '%$cari%' OR penulis like '%$cari%' OR penerbit like '%$cari%' OR deskripsi like '%$cari%' AND status='1'");
            $jumlah_post = mysqli_num_rows($query);

            if (!isset($_GET['page']) or ($_GET['page']<0)
            or ($_GET['page'] > $jumlah_post)) $page = 1;
            else $page = $_GET['page'];

            $offset = ($page -1) * $perpage;

            $query = mysqli_query($database, "SELECT * FROM buku WHERE judul like '%$cari%' OR tahun_terbit like '%$cari%' OR penulis like '%$cari%' OR penerbit like '%$cari%' OR deskripsi like '%$cari%' AND status='1' ORDER BY `id` DESC LIMIT $offset, $perpage");

            while ($data = mysqli_fetch_assoc($query)) {
                echo "<div id='single'>";
                echo "<h2>".$data['judul']."</h2>";
                echo "<div id='featured-image'><img src='gambar/".$data['gambar']."' width='130px'>&nbsp;</div>";
                echo "<div align='justify'>".$data['deskripsi']."</div>";
                echo "<div id='more'><a href='?b=detailbuku.php&lihat=".$data['id']."'>Baca Selengkapnya</a></div>";
                echo "</div>";
            }

            echo "<TR><TD COLSPAN=3 ALIGN='right'>";
            for ($i = 1; $i <= ceil ($jumlah_post/$perpage); $i++) {
                if ($i == $page) echo "<B>$i</B> ";
                else echo "<A HREF='?b=cari.php&page=$i'>$i</A> ";
            }
            echo "</TD></TR>\n";
        ?>
    </CENTER>
</div>