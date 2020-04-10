<?php
// include database connection file
include_once("../koneksi.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];
    $jdl= htmlspecialchars($_POST['judul']);
    $pos= htmlspecialchars($_POST['post']);
    // update user data
    $result = mysqli_query($db, "UPDATE terbitan SET judul='$jdl',post='$pos',tanggal=CURRENT_TIMESTAMP WHERE kd_terbit='$id'");
    if($result) // will return true if succefull else it will return false
    {
    // code here
        header("Location: addpost.php");
    }else{
            echo "Error: " . $result . "<br>" . $db->error;
    }
    // Redirect to homepage to display updated user in list
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($db, "SELECT * FROM terbitan WHERE kd_terbit='$id'");

while($user_data = mysqli_fetch_array($result))
{
    $jdl = $user_data['judul'];
    $pos = $user_data['post'];
}
?>
<html>
<head>  
    <title>Edit User Data</title>
</head>

<body>
    <a href="addpost.php">Home</a>
    <br/><br/>

    <form name="update_pos" method="post" action="editpost.php">
        <table border="0">
            <tr> 
                <td>Judul</td>
                <td><input type="text" name="judul" value=<?php echo $jdl;?>></td>
            </tr>
            <tr> 
                <td>Post</td>
                <td><textarea name="post" rows="5" cols="40"><?php echo $pos;?></textarea>
            </tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>