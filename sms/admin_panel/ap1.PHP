<?php 
session_start();

$name=$_POST['name'];
$sid=$_POST['sid'];
$sid1=$_POST['sid'];
$sid2=$_POST['sid'];
$gender=$_POST['Gender'];
$dob=$_POST['dob'];
$address=$_POST['address'];
$std=$_POST['std'];
$sec=$_POST['sec'];
$pname=$_POST['pname'];
$pcontact=$_POST['pcontact'];
$attendance=$_POST['attendance'];
$billno=$_POST['billno'];
$dop=$_POST['dop'];





$conn=new mysqli('localhost','root','','schoolmanagement');
if($conn->connect_error){
	die('connection failed:'.$conn->connect_error);

}
else{
$stmt=$conn->prepare("insert into student(sname,sid,dob,address,gender,std,sec,attendance) values(?,?,?,?,?,?,?,?)");
$stmt->bind_param("sisssisi",$name,$sid,$dob,$address,$gender,$std,$sec,$attendance);


$stmt->execute();
$stmt2=$conn->prepare("insert into parent(pname,pcontact,sid)values(?,?,?)");
$stmt2->bind_param("sii",$pname,$pcontact,$sid1);
$stmt2->execute();
$stmt3=$conn->prepare("insert into account(sid,billno,dop)values(?,?,?)");
$stmt3->bind_param("iis",$sid2,$billno,$dop);
$stmt3->execute();
echo "<script type='text/javascript'>alert('inserted ');window.location='admin_panel1.php'</script>";
$stmt->close();
$stmt2->close();
$stmt3->close();
$conn->close();

}



 ?>