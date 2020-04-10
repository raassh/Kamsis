<?php
// include database connection file
include_once("../koneksi.php");

// Get id from URL to delete that user
$id = $_GET['id'];

// Delete user row from table based on given id
$result = mysqli_query($db, "DELETE FROM komentar WHERE kd_terbit='$id'");
$result2 = mysqli_query($db, "DELETE FROM terbitan WHERE kd_terbit='$id'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:addpost.php");
?>