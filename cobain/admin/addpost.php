<?php 
    session_start();
    if($_SESSION['status']!="login"){
        header("location:../cobain.php?pesan=belum_login");
    }
    ?>
<?php
// Create database connection using config file
include_once("../koneksi.php");
include_once 'autoincr.php';

// Fetch all users data from database
$aid= $_SESSION['admin_id'];
$pstan = mysqli_query($db, "SELECT admin.admin_id, admin.username, terbitan.post, terbitan.tanggal, terbitan.kd_terbit, terbitan.judul FROM terbitan INNER JOIN admin on terbitan.admin_id=admin.admin_id where admin.admin_id = '$aid'");
?>
<html lang="en">
    <head>
    <title>Halaman User</title>
</head>
<body>
<div>
    <h1>Halo 
    <?php
        echo $_SESSION['username']; 
    ?>
    </h1>
</div>
<a href="add.php">ADD POST</a><br/><br/>
<div>
    <div>
    <?php while ($pos = mysqli_fetch_array($pstan)) {
    ?>
    <div>
        <div><h2><?php echo $pos['judul']?></h2></div>
        <div><?php echo substr($pos['post'],0,250);
            echo ".....<br />[<a href=editpost.php?id=".$pos['kd_terbit'].">Edit</a> ] [<a href=delete.php?id=".$pos['kd_terbit'].">Delete</a> ] <hr/>";
            ?>              
        </div>
    </div>
<?php }?>
<a href="logout.php">LOGOUT</a>
</div>
</body>
</html>