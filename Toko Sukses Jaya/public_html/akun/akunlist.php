<?php
    $database = mysqli_connect('localhost','id11991958_root','usbww','id11991958_tokobuku') or die("Ngga bisa konek, Alasan dari MySQL :".mysqli_error($mysqli)); 
    if (!$database)   die ("Ngga bisa konek, Alasan dari MySQL :".mysqli_error()); 
    $result = mysqli_query ($database, "SELECT * FROM akun where id >1"); 
?>
<div id="content">
<div id="single">
<h2>Daftar Akun</h2>
    <table style="border-collapse: collapse;">
            <tr style="text-align: center; border-bottom: 1px solid #ddd; background-color:#ddd;">
                <th style="padding:15px">ID</th>
                <th style="padding:15px">Username</th>
                <th style="padding:15px">Nama</th>
                <th style="padding:15px">E-mail</th>
                <th style="padding:15px">Sex</th>
                <th style="padding:15px">Tanggal Daftar</th>
                <th style="padding:15px">Aksi</th>
            </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr style="text-align: center; border-bottom: 1px solid #ddd;">
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['sex']; ?></td>
                <td><?php echo $row['tanggal_daftar']; ?></td>
                <td>
                    <?php
                        if($row['status']==1) echo "<div id='more'><a href='?a=aksi.php&delete=".$row['id']."'>Delete</a></div>";
                        if($row['status']==0) echo "<div id='more'><a href='?a=aksi.php&restore=".$row['id']."'>Restore</a></div>";
                    ?>
                </td>
            </tr>
        <?php endwhile; ?>
</table>
</div>
</div>