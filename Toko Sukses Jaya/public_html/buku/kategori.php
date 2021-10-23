<div id='content'>
    <center>
        <?php
            $idkategori = $_GET['k'];
            switch ($idkategori)
            {
                case "1": $kategori="Data Science"; break;
                case "2": $kategori="Web Programming"; break;
                case "3": $kategori="Arduino Programming"; break;
                case "4": $kategori="Android Programming";
            }
            $database = mysqli_connect('localhost','id11991958_root','usbww','id11991958_tokobuku') or die("Ngga bisa konek, Alasan dari MySQL :".mysqli_error($mysqli)); 
            if (!$database)   die ("Ngga bisa konek, Alasan dari MySQL :".mysqli_error()); 
            $result = mysqli_query ($database, "SELECT * FROM buku WHERE kategori='$kategori' AND status='1'"); 
            
            $perpage = 5;
            $query = mysqli_query($database, "SELECT * FROM buku WHERE kategori='$kategori' AND status='1'");
            $jumlah_post = mysqli_num_rows($query);

            if (!isset($_GET['page']) or ($_GET['page']<0)
            or ($_GET['page'] > $jumlah_post)) $page = 1;
            else $page = $_GET['page'];

            $offset = ($page -1) * $perpage;

            $query = mysqli_query($database, "SELECT * FROM buku WHERE kategori='$kategori' AND status='1' ORDER BY `id` DESC LIMIT $offset, $perpage");

            while ($data = mysqli_fetch_assoc($query)) {
                echo "<div id='single' align='left'>";
                echo "<h2>".$data['judul']."</h2>";
                echo "<div class='fitur-gambar'><img src='gambar/".$data['gambar']."' width='600px'>&nbsp;</div>";
                echo "<div align='justify' class='prev'>".$data['deskripsi']."</div>";
                echo "<div id='more'><a href='?b=detailbuku.php&lihat=".$data['id']."'>Baca Selengkapnya</a></div>";
                echo "</div>";
            }

            echo "<TR><TD COLSPAN=3 ALIGN='right'>";
            for ($i = 1; $i <= ceil ($jumlah_post/$perpage); $i++) {
                if ($i == $page) echo "<B>$i</B> ";
                else echo "<A HREF='?b=kategori.php&page=$i'>$i</A> ";
            }
            echo "</TD></TR>\n";
        ?>
    </CENTER>
</div>