<!DOCTYPE html>
<html>
<head>
	<title>titter</title>
	<style type="text/css">
    </style>
</head>
<body>
	<h2>Login</h2>
	<br/>
	<!-- cek pesan notifikasi -->
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman admin";
		}
	}
	?>
	<br/>
	<br/>
	<form method="post" action="login.php">
		<table>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input type="text" name="username" placeholder="Masukkan username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type="password" name="password" placeholder="Masukkan password"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" value="LOGIN"></td>
			</tr>
		</table>			
	</form>
<?php
// Create database connection using config file
include_once("koneksi.php");
include_once 'admin/autoincr.php';

// Fetch all users data from database
$pstan = mysqli_query($db, "SELECT admin.admin_id, admin.username, terbitan.post, terbitan.tanggal, terbitan.kd_terbit, terbitan.judul FROM terbitan INNER JOIN admin on terbitan.admin_id=admin.admin_id");
?>
<div>
<?php while ($pos = mysqli_fetch_array($pstan)) {
    ?>
    <div>
        <div><h2><?php echo $pos['judul']?></h2></div>
        <div><?php echo substr($pos['post'],0,250);
            echo ".....<br />[ <a href=index2.php?id=".$pos['kd_terbit'].">Read More</a> ]<hr/>";
            ?>              
        </div>
    </div>
<?php }?>
</div>
</body>
</html>