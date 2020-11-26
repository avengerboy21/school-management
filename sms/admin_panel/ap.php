<?php 
session_start();

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




$conn=new mysqli('localhost','root','','schoolmanagement');
if($conn->connect_error){
	die('connection failed:'.$conn->connect_error);

}
else{
$stmt=$conn->prepare("insert into teacher(tid,tname,dob,doj,contact,address,gender,position,email,scode) values(?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("isssissssi",$tid,$name,$dob,$doj,$contact,$address,$gender,$position,$email,$scode);

$stmt->execute();

echo "<script type='text/javascript'>alert('inserted ');window.location='admin_panel.php'</script>";
$stmt->close();
$conn->close();

}



 ?>