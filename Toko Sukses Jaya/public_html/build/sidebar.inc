<?php
	$database = mysqli_connect('localhost','id11991958_root','usbww','id11991958_tokobuku') or die("Ngga bisa konek, Alasan dari MySQL :".mysqli_error($mysqli)); 
	if (!$database)   die ("Ngga bisa konek, Alasan dari MySQL :".mysqli_error()); 
?>
	<div id="sidebar">
		<li class="widget">
			<h2 style="color:white;text-shadow:#333333 1px 2px; -webkit-text-stroke:#333333 0.5px;font-family: cursive;">Buku Populer</h2>
			<ul>
				<?php
					$query1 = mysqli_query($database, "SELECT * FROM buku WHERE status = 1 ORDER BY popular DESC LIMIT 3");
					while ($data1 = mysqli_fetch_assoc($query1)) {
						echo "<li><a href='?b=detailbuku.php&lihat=".$data1['id']."'>".$data1['judul']."</a></li>";
					}
				?>
			</ul>
		</li>
		<li class="widget">
			<h2 style="color:white;text-shadow:#333333 1px 2px; -webkit-text-stroke:#333333 0.5px; font-family: cursive;">Buku Terbaru</h2>
			<ul>
				<?php
					$query2 = mysqli_query($database, "SELECT * FROM buku WHERE status = 1 ORDER BY tanggal DESC LIMIT 3");
					while ($data2 = mysqli_fetch_assoc($query2)) {
						echo "<li><a href='?b=detailbuku.php&lihat=".$data2['id']."'>".$data2['judul']."</a></li>";
					}
				?>
			</ul>
		</li>
		
		<li class="widget">
			<h2 style="color:white;text-shadow:#333333 1px 2px; -webkit-text-stroke:#333333 0.5px; font-family: cursive;">Lagu Hari Ini</h2>
			<ul>
				<audio controls><source src="audio/audio1.mp3" type="audio/mp3"></audio>		
			</ul>
		</li>
		<li class="widget">
			<h2 style="color:white;text-shadow:#333333 1px 2px; -webkit-text-stroke:#333333 0.5px; font-family: cursive;"> Anda Pengunjung Ke-</h2>
			<ul>
				<li>
				<?php
				include_once 'hitcounter.inc';
				?>
				</li>
			</ul>
		</li>
	</div>