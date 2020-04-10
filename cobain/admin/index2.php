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
$result = mysqli_query($db, "SELECT * FROM admin ORDER BY admin_id DESC");
$pstan = mysqli_query($db, "SELECT admin.admin_id, admin.username, terbitan.post, terbitan.tanggal, terbitan.kd_terbit FROM terbitan INNER JOIN admin on terbitan.admin_id=admin.admin_id");
$arr = mysqli_query($db, "SELECT kd_komentar, tanggal FROM komentar ORDER BY tanggal DESC");
$kda = mysqli_fetch_array($arr);
$kdk= autonumber($kda['kd_komentar'], 3, 4);
?>

<html>
<head>    
    <title>Homepage</title>
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
    <link href="BlogPostAssets/styles/blogPostStyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="mainwrapper">
  <header> 
    <!--**************************************************************************
    Header starts here. It contains Username and navigation links. 
    ****************************************************************************-->
    <div id="logo">
        <h1>Halo 
        <?php
            echo $_SESSION['username']; 
        ?>
    </h1>
    </div>

    <nav><a href="logout.php" style="text-align: right;">LOGOUT</a></nav>
  </header>
<br>

<a href="add.php" style="background: #222222; border: 15px solid #222222; padding: 0 10px;color: #ffffff; font-family: sans-serif; font-size: 13px; width: 4cm; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;">POST</a>
<div>
<section id="mainContent"; style="background: #D0D0D0; border-radius: 7px">
<!--************************************************************************
    Main Blog content starts here
****************************************************************************-->
<div style="background: white; padding: 10 10px">
<?php while ($pos = mysqli_fetch_array($pstan)) {
    $tanda = $pos['kd_terbit'];
    $comen = mysqli_query($db,"SELECT komentar.comment, admin.username, komentar.kd_terbit FROM komentar INNER JOIN admin ON komentar.admin_id=admin.admin_id WHERE komentar.kd_terbit = '$tanda' ");?>
    <div id="posy">
        <div id="kiri"><?php echo $pos['username']?></div>
        <div id="kanan"><?php echo $pos['tanggal']?></div>
        <div><?php echo $pos['post']?></div>
    </div>
    <div id="posy">
        Komentar
        <?php
            while ($kom = mysqli_fetch_array($comen)) {
        ?>
        <div><?php echo $kom['comment']?></div>
        <?php }?>
    </div>
    <form action="index2.php" method="post" name="addcomment">
        <textarea name="comment" rows="5" cols="40" placeholder="Add your comment here"></textarea> 
        <input type="hidden" name="kad" value=<?php echo $tanda; ?>>
      <input type="submit" name="Submit" value="add" />
    </form>
<?php
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        //$id = $_POST['id'];
        //$usern = $_POST['username'];
        //$pass = $_POST['password'];
        include_once '../koneksi.php';
        $cmnt = $_POST['comment'];
        $a_id = $pos['admin_id'];
        $kd = $_POST['kad'];
        // include database connection file
        // Insert user data into table
        //$result = mysqli_query($db, "INSERT INTO admin(id,username,password) VALUES('$id','$usern','$pass')");
        $result = mysqli_query($db, "INSERT INTO komentar(kd_komentar,comment,admin_id,kd_terbit) VALUES('$kdk','$cmnt','$a_id','$kd')");
        // Show message when user added
        //echo "User added successfully. <a href='index2.php'>View Users</a>";

        if($result) // will return true if succefull else it will return false
        {
        // code here
        echo "added successfully. <a href='index2.php'>View Users</a>";
        }else{
            echo "Error: " . $result . "<br>" . $db->error;
        }
    }
    ?>
<?php }?>
</div>
</section>

</div>
</div>
</body>
</html>