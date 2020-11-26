<?php 

$name=$_POST['name'];
$email=$_POST['email'];
$gender=$_POST['Gender'];
$dob=$_POST['dob'];
$doj=$_POST['doj'];
$tid=$_POST['tid'];
$scode=$_POST['handlingsubcode'];
$contact=$_POST['contact'];
$address=$_POST['address'];
$position=$_POST['position'];




$con=new mysqli('localhost','root','','schoolmanagement');
if($con->connect_error){
	die('connection failed:'.$con->connect_error);

}
else{
	$query="update teacher set tname='".$name."',gender='".$gender."',contact='".$contact."',email='".$email."',dob='".$dob."',doj='".$doj."', address='".$address."',scode='".$scode."',position='".$position."'where tid='".$tid."'";
if(mysqli_query($con,$query)){
            echo "<html><head><script>alert('Member Update Successfully');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=admin_panel2.php'>";
        }else{
             echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
             echo "error".mysqli_error($con);
        }

}



 ?>