<div id="wrapper">
	<div id="container">
	<header>Toko Buku Sukses Jaya Utama
		<?php
			if(isset($_SESSION['akun'])){
				// echo "<div style='float:right; margin-right:50px;'>";
				// echo '<font size="6">'.$_SESSION['akun'].'</font>';
				// echo "</div><br>";
				echo '<a href="?log"><input type="button" name="loginregister" value="Logout" style="float:right;"></a>';
			} elseif(isset($_SESSION['admin'])) {
				// echo "<div style='float:right; margin-right:50px;'>";
				// echo '<font size="6">'.$_SESSION['admin'].'</font>';
				// echo "</div><br>";
				echo '<a href="?log"><input type="button" name="loginregister" value="Logout Admin" style="float:right;"></a>';
				// header("location:?p=build./content.inc");
			} else {
				echo '<a href="?l=formlogin.inc"><input type="button" name="loginregister" value="Login/Register" style="float:right;"></a>';
				// header("location: ?p=build./content.inc");
			}
		?>
	<br>
	<form action="?b=cari.php" method="post">
		<input type="submit" name="search" value="Search" style="float:right;">
    	<!-- <a href="?b=cari.php"><input type="button" value="search" style="float:right;"></a> -->
		<input type="text" name="caribuku" placeholder="Cari Buku" style="float:right;">
	</form>
	<!-- </div> -->
	
	</header>
	<!-- </div> -->
