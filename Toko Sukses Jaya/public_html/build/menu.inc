	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="?b=list.php">List Buku</a></li>
			<li><a href="?c=keranjang.php">Keranjang</a>
			<li><a href="?a=akun.php">Akun Saya</a>
			<li><a href="?k=kontak.inc">Kontak</a></li>
			<?php 
				if(isset($_SESSION['admin'])) {
					echo "<li><a href='?m=all.php'>MOD</a></li>";
				}
        	?>
		</ul>
	</nav>
