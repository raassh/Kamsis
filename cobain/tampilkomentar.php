<?php 
include 'koneksi.php';
?>
<div>
	<?php 
	$data = mysqli_query($db,"select * from komentar where kd_terbit = '$id'order by tanggal asc");
	while($d=mysqli_fetch_array($data)){
	?>
	<div style="width:20%;
            float:left;"><?php echo $d['nama']; ?></div>
	<div style="width:80%;
            float:right;"><?php echo $d['tanggal']; ?></div>
	<div><?php echo $d['comment']; ?></div>
	<?php } ?>
</div>