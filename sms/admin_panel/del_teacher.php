<?php
session_start();
$host     = "localhost"; // Host name 
$username = "root"; // Mysql username 
$password = ""; // Mysql password 
$db_name  = "schoolmanagement"; // Database name 

// Connect to server and select databse.
$con = mysqli_connect($host, $username, $password, $db_name);


$msgid = $_POST['name'];
if (strlen($msgid) > 0) {
    mysqli_query($con, "DELETE FROM teacher WHERE tid='$msgid'");
   
   
    echo "<html><head><script>alert('Member Deleted');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=admin_panel2.php'>";
    
} else {
    echo "<html><head><script>alert('ERROR! Delete Opertaion Unsucessfull');</script></head></html>";
   echo "error".mysqli_error($con);

}

?>