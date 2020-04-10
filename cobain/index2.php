<?php
// Create database connection using config file
include_once("koneksi.php");

// Fetch all users data from database
$id = $_GET['id'];
$pstan = mysqli_query($db, "SELECT admin.admin_id, admin.username, terbitan.post, terbitan.tanggal, terbitan.kd_terbit, terbitan.judul FROM terbitan INNER JOIN admin on terbitan.admin_id=admin.admin_id where terbitan.kd_terbit = '$id' limit 1");
$pos = mysqli_fetch_array($pstan);
?>

<html>
<head>    
    <title>Homepage</title>
    
    <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
    <style type="text/css">
        #kiri
            {
            width:20%;
            float:left;
            }
        #kanan
            {
            width:80%;
            float:right;
            }
        #posy {
            border: solid;
        }
    </style>
</head>

<body>
<div>
    <div>
        <div id="kiri"><?php echo $pos['username']?></div>
        <div id="kanan"><?php echo $pos['tanggal']?></div>
        <div><h2><?php echo $pos['judul']?></h2></div>
        <div><?php echo $pos['post']?></div>
    </div>
<div class="tampildata" id="posy">
KOMENTAR
<?php 
include 'koneksi.php';
?>
<div>
    <?php 
    $data = mysqli_query($db,"select * from komentar where kd_terbit = '$id'order by tanggal asc");
    while($d=mysqli_fetch_array($data)){
    ?>
    <div>
    <div style="width:20%;
            float:left;"><?php echo $d['nama']; ?></div>
    <div style="width:80%;
            float:right;"><?php echo $d['tanggal']; ?></div>
    </div>
    <div><?php echo $d['comment']; ?></div>
    <?php } ?>
</div>
</div>
    <div>
    </div>
    <form method="post" name="addcomment" class="form-comment" onsubmit="validasiEmail()">
        <table width="25%" border="0">
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
        </table>
        <input type="hidden" name="kdt" value=<?php echo $id; ?>>
        <textarea name="comment" rows="5" cols="40" placeholder="add a comment..."></textarea> 
        <button class="tombol-simpan" type="submit">add</button>
    </form>
</div>
<script type="text/javascript">
        function validasiEmail() {
            var rs = document.forms["addcomment"]["email"].value;
            var atps=rs.indexOf("@");
            var dots=rs.lastIndexOf(".");
            if (atps<1 || dots<atps+2 || dots+2>=rs.length) {
                alert("Alamat email tidak valid.");
                return false;
            }else {
                alert("Alamat email valid.");
            }
        }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".tombol-simpan").click(function(){
            var data = $('.form-comment').serialize();
            $.ajax({
                type: 'POST',
                url: "aksi.php",
                data: data,
            });
        });
    });
</script>
<a href="cobain.php">kembali</a>
</body>
</html>