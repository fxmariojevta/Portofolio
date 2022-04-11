<?php
    		session_start();
            date_default_timezone_set('Asia/Jakarta');
            
            if(isset($_GET['log'])) session_unset();
            if(!isset($_SESSION['css'])) $_SESSION['css'] = 'putih';
            if(isset($_GET['css'])) $_SESSION['css'] = $_GET['css'];
            //  if(isset($_GET['css']))	$filecss = $_GET['css'].".css"; 
    		// $filecss="putih.css";
            $filecss = $_SESSION['css'].".css";
?>
<html>
<head>
	<title>Toko Buku Sukses Jaya Utama</title>
	<link rel="stylesheet" type="text/css" href="css/<?= $filecss; ?>">
</head>
<body>
<?php
    include 'build/header.inc';
    include 'build/menu.inc';
    // include 'build./kategori.inc';

    if(isset($_GET['p'])){
        $page = 'build/'.$_GET['p'];
        if(isset($page)) include "$page"; else include "build/content.inc";
    } 
    elseif(isset($_GET['b'])) {
        $buku='buku/'.$_GET['b'];
        if(isset($buku)) include "$buku";
    }
    elseif(isset($_GET['k'])) {
        $kontak='kontak/'.$_GET['k'];
        if(isset($kontak)) include "$kontak";
    }
    elseif(isset($_GET['l'])) {
        $login='login/'.$_GET['l'];
        if(isset($login)) include "$login";
    }
    elseif(isset($_GET['m'])) {
        $admin='admin/'.$_GET['m'];
        if(isset($admin)) include "$admin";
    }
    elseif(isset($_GET['a'])) {
        $akun='akun/'.$_GET['a'];
        if(isset($akun)) include "$akun";
    }
    elseif(isset($_GET['c'])) {
        $keranjang='keranjang/'.$_GET['c'];
        if(isset($keranjang)) include "$keranjang";
    }
    else include "build/content.inc";
        include 'build/sidebar.inc';
    include 'build/footer.inc'; 		
?>
</body>
</html>