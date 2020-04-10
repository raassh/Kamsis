<?php 
include 'koneksi.php';
include_once 'admin/autoincr.php';
$arr = mysqli_query($db, "SELECT * FROM komentar ORDER BY tanggal DESC");
$kdk = mysqli_fetch_array($arr);
$nama = htmlspecialchars($_POST['nama']);
$eml = htmlspecialchars($_POST['email']);
$komen = htmlspecialchars($_POST['comment']);
$kdk= autonumber($kdk['kd_komentar'], 3, 4);
$kdt= $_POST['kdt'];

$result = mysqli_query($db, "INSERT INTO komentar(kd_komentar, kd_terbit, email, tanggal, nama, comment) VALUES('$kdk','$kdt','$eml',CURRENT_TIMESTAMP,'$nama', '$komen')");
	if($result) // will return true if succefull else it will return false
        {
        // code here
        echo "added successfully.";
        }else{
            echo "Error: " . $result . "<br>" . $db->error;
        }
?>