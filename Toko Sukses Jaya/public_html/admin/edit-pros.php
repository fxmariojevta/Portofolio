<?php
    $target_dir = "gambar/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $duar = "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $duar = "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000000) {
        $duar = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $duar = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        if (isset($_GET["kirim"]) && $_GET["kirim"] == "1") {
            $_SESSION['duar'] = "";
            $_SESSION['duarR'] = "";
            $mysqli = new mysqli('localhost','id11991958_root','usbww','id11991958_tokobuku') or die(mysqli_error($mysqli));
            $id=$_GET['id'];
            $judul=$_POST['judul'];
            $penulis=$_POST['penulis'];
            $penerbit=$_POST['penerbit'];
            $deskripsi=$_POST['deskripsi'];
            $tahunTerbit=$_POST['tahun_terbit'];
            $stok=$_POST['stok'];
            $harga=$_POST['harga'];
            $kategori=$_POST['kategori'];
            if(isset($_SESSION['judul'])) {
                unset($_SESSION['judul']);
                unset($_SESSION['penulis']);
                unset($_SESSION['penerbit']);
                unset($_SESSION['deskripsi']);
                unset($_SESSION['tahun_terbit']);
                unset($_SESSION['stok']);
                unset($_SESSION['harga']);
            }
            $mysqli->query("UPDATE buku SET judul='$judul', penulis='$penulis', deskripsi='$deskripsi', penerbit='$penerbit', tahun_terbit='$tahunTerbit', stok='$stok', harga='$harga' WHERE id='$id'") or die($mysqli->error);
            header("Location: ?m=all.php");
            exit();
        }
        $duarR = "Sorry, your file was not uploaded.";
        $_SESSION['duar'] = $duar;
        $_SESSION['duarR'] = $duarR;
        $_SESSION['judul']=$_POST['judul'];
        $_SESSION['penulis']=$_POST['penulis'];
        $_SESSION['penerbit']=$_POST['penerbit'];
        $_SESSION['deskripsi']=$_POST['deskripsi'];
        $_SESSION['tahun_terbit']=$_POST['tahun_terbit'];
        $_SESSION['stok']=$_POST['stok'];
        $_SESSION['harga']=$_POST['harga'];
        $_SESSION['kategori']=$_POST['kategori'];
        header("Location: ?m=edit.php");
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $mysqli = new mysqli('localhost','id11991958_root','usbww','id11991958_tokobuku') or die(mysqli_error($mysqli));
            $_SESSION['duar'] = "";
            $_SESSION['duarR'] = "";
            if(isset($_SESSION['judul'])) {
                unset($_SESSION['judul']);
                unset($_SESSION['penulis']);
                unset($_SESSION['penerbit']);
                unset($_SESSION['deskripsi']);
                unset($_SESSION['tahun_terbit']);
                unset($_SESSION['stok']);
                unset($_SESSION['harga']);
            }
            $id=$_GET['id'];
            $judul=$_POST['judul'];
            $penulis=$_POST['penulis'];
            $penerbit=$_POST['penerbit'];
            $deskripsi=$_POST['deskripsi'];
            $tahunTerbit=$_POST['tahun_terbit'];
            $stok=$_POST['stok'];
            $harga=$_POST['harga'];
            $kategori=$_POST['kategori'];
            $gambar=basename($_FILES["fileToUpload"]["name"]);
            if (isset($_GET["kirim"]) && $_GET["kirim"] == "1") {
                $mysqli->query("UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', deskripsi='$deskripsi', tahun_terbit='$tahunTerbit', stok='$stok', gambar='$gambar', harga='$harga' WHERE id='$id'") or die($mysqli->error);
                header("Location: ?m=all.php");
                exit();
            }
            $mysqli->query("INSERT INTO buku (id, kategori, judul, penulis, penerbit, status, tahun_terbit, stok, deskripsi, gambar, harga, tanggal) values (0, '$kategori', '$judul', '$penulis', '$penerbit', 1, '$tahunTerbit', '$stok', '$deskripsi', '$gambar', '$harga', now())") or die($mysqli->error);
            header("Location: ?m=all.php");
        } else {
            $duarR = "Sorry, there was an error uploading your file.";
            $_SESSION['duarR'] = $duarR;
            $_SESSION['judul']=$_POST['judul'];
            $_SESSION['penulis']=$_POST['penulis'];
            $_SESSION['penerbit']=$_POST['penerbit'];
            $_SESSION['deskripsi']=$_POST['deskripsi'];
            $_SESSION['tahun_terbit']=$_POST['tahun_terbit'];
            $_SESSION['stok']=$_POST['stok'];
            $_SESSION['harga']=$_POST['harga'];
            $_SESSION['kategori']=$_POST['kategori'];
            header("Location: ?m=edit.php");
        }
    }
?>