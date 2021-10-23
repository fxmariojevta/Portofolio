<div id='content'>
    <center>
        <h2>Produk Buku</h2>
        <a href='?m=edit.php'>Tambah Buku</a>
        <?php
            $database = mysqli_connect('localhost','id11991958_root','usbww','id11991958_tokobuku') or die("Ngga bisa konek, Alasan dari MySQL :".mysqli_error($mysqli)); 
            if (!$database)   die ("Ngga bisa konek, Alasan dari MySQL :".mysqli_error()); 
            $result = mysqli_query ($database, "SELECT * FROM buku"); 
            
            $perpage = 5;
            $query = mysqli_query($database, "SELECT * FROM buku");
            $jumlah_post = mysqli_num_rows($query);

            if (!isset($_GET['page']) or ($_GET['page']<0)
            or ($_GET['page'] > $jumlah_post)) $page = 1;
            else $page = $_GET['page'];

            $offset = ($page -1) * $perpage;

            $query = mysqli_query($database, "SELECT * FROM buku ORDER BY `id` DESC LIMIT $offset, $perpage");

            while ($data = mysqli_fetch_assoc($query)) {
                echo "<div id='single' align='left'>";
                echo "<h2>".$data['judul']."</h2>";
                echo "<div class='fitur-gambar'><img src='gambar/".$data['gambar']."' width='600px'>&nbsp;</div>";
                echo "<div align='justify' class='prev'>".$data['deskripsi']."</div>";
                echo "<div id='more'><a href='?m=eca.php&lihat=".$data['id']."'>Baca Selengkapnya</a></div>";
                echo "<div id='more'><a href='?m=edit.php&update=".$data['id']."'>Edit</a></div>";
                if($data['status']==1) echo "<div id='more'><a href='?m=delete.php&id=".$data['id']."'>Delete</a></div>";
                if($data['status']==0) echo "<div id='more'><a href='?m=restore.php&id=".$data['id']."'>Restore</a></div>";
                echo "</div>";
            }

            echo "<TR><TD COLSPAN=3 ALIGN='right'>";
            for ($i = 1; $i <= ceil ($jumlah_post/$perpage); $i++) {
                if ($i == $page) echo "<B>$i</B> ";
                else echo "<A HREF='?m=all.php&page=$i'>$i</A> ";
            }
            echo "</TD></TR>\n";
        ?>
    </CENTER>
</div>