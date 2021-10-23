<?php
    $target_dir = "bukti/";
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
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
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
        $id=$_SESSION['akun'];
        $alamat=$_POST['alamat'];
        $mysqli = new mysqli('localhost','id11991958_root','usbww','id11991958_tokobuku') or die(mysqli_error($mysqli));
        $mysqli->query("UPDATE akun SET alamat='$alamat' WHERE id='$id'") or die($mysqli->error);
        $duarR = "Sorry, your file was not uploaded.";
        $_SESSION['duar'] = $duar;
        $_SESSION['duarR'] = $duarR;
        header("Location: ?c=bayar.php");
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $mysqli = new mysqli('localhost','id11991958_root','usbww','id11991958_tokobuku') or die(mysqli_error($mysqli));
            $id=$_SESSION['akun'];
            $idtransaksi=$_SESSION['idtransaksi'];
            $total=$_SESSION['total'];
            $alamat=$_POST['alamat'];
            $bukti=basename($_FILES["fileToUpload"]["name"]);
            $_SESSION['duar'] = "";
            $_SESSION['duarR'] = "";
            unset($_SESSION['total']);
            unset($_SESSION['idtransaksi']);
            $mysqli->query("UPDATE keranjang SET status = 0 WHERE id_akun='$id'") or die($mysqli->error);
            $mysqli->query("INSERT INTO transaksi (id, id_akun, id_transaksi, total, alamat, bukti, status, tanggal) values (0, '$id', '$idtransaksi', '$total', '$alamat', '$bukti', 'Proses', now())") or die($mysqli->error);
            header("Location: ?c=validasi.php");
        } else {
            $duarR = "Sorry, there was an error uploading your file.";
            $_SESSION['duarR'] = $duarR;
            header("Location: ?c=bayar.php");
        }
    }
?>