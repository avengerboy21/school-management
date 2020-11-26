<?php 
session_start();

$name=$_POST['name'];
$sid=$_POST['sid'];
$sid1=$_POST['sid'];
$sid2=$_POST['sid'];
$gender=$_POST['Gender'];
$dob=$_POST['dob'];
$address=$_POST['address'];
$pname=$_POST['pname'];
$pcontact=$_POST['pcontact'];
$attendance=$_POST['attendance'];
$billno=$_POST['billno'];
$dop=$_POST['dop'];


$con=new mysqli('localhost','root','','schoolmanagement');
if($con->connect_error){
	die('connection failed:'.$con->connect_error);

}
else{
	$query="update student set sname='".$name."',gender='".$gender."',dob='".$dob."', address='".$address."',attendance='".$attendance."'where sid='".$sid."'";
if(mysqli_query($con,$query)){
             $query2="update parent set pname='".$pname."',pcontact='".$pcontact."' where sid='".$sid1."'";


if(mysqli_query($con,$query2)){
             $query3="update account set billno='".$billno."',dop='".$dop."' where sid='".$sid2."'";



             if(mysqli_query($con,$query3)){
              echo "<html><head><script>alert('Member Update Successfully');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=admin_panel3.php'>";
        }
        else{
             echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
             echo "error".mysqli_error($con);
        }
        }
        else{
             echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
             echo "error".mysqli_error($con);
        }


        }
        else{
             echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
             echo "error".mysqli_error($con);
        }







        

}



 ?>