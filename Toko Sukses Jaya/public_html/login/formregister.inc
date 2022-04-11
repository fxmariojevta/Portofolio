<?php
	$username = "";
	$nama ="";
    $email = "";
    $man ="";
	$wanita = "";
	$pria = "";
	if(isset($_SESSION['nama'])) {
		$username = $_SESSION['username'];
		$nama = $_SESSION['nama'];
		$email = $_SESSION['email'];
		$pria = $_SESSION['pria'];
		$wanita = $_SESSION['wanita'];
	}
?>
<div id="content">
	<div id="single">
		<table border="0">
		<FORM METHOD="POST" ACTION="?l=dataprocessorregister.php">
		<tr>
			<td>Username</td>
			<td><INPUT TYPE="text" NAME="username" size=53 MAXLENGTH="36" VALUE=<?php echo $username?>></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><INPUT TYPE="password" NAME="pass1" size=53 MAXLENGTH="32"></td>
		</tr>		
		<tr>
			<td>Ulangi Password</td>
			<td><INPUT TYPE="password" NAME="pass2" size=53 MAXLENGTH='32'></td>
		</tr>

		<tr>
			<td>Nama</td>
			<td><INPUT TYPE="text" NAME="nama" size=53 MAXLENGTH="36" VALUE=<?php echo $nama?>></td>
		</tr>

		<tr>
			<td>Email</td>
			<td><INPUT TYPE="text" NAME="email" size=53 MAXLENGTH="36" VALUE=<?php echo $email?>></td>
		</tr>

		<tr>
			<td>Sex</td>
			<td><INPUT TYPE="radio" NAME="sex" VALUE="pria" <?php echo $pria?>>Pria <INPUT TYPE="radio" NAME="sex" VALUE="wanita" <?php echo $wanita?>>Wanita</td>
		</tr>

			<td>
				<INPUT TYPE="submit" VALUE="Daftar"> <INPUT TYPE="reset">
			</td>
		</tr>
		<tr>
		<td>
		Sudah Punya Akun?
		</td>
		<td><a href="?l=formlogin.inc"><input type="button" name="register" value="Login"></a>
		</td>
		</tr>
		</FORM>
		</table>
	</div>
</div>
