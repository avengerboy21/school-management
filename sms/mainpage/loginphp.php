<?php
	session_start();
	$con=mysqli_connect('localhost','root');


	$db=mysqli_select_db($con,'logindatabase');

	if (isset($_POST['submit'])) {
		$username=$_POST['user'];
		$password=$_POST['pass'];

		$sql= "select * from login_table where user='$username' and pass='$password' ";
		$query =mysqli_query($con,$sql);
		# code...

		$row=mysqli_num_rows($query);
			if ($row==1) {
				# code...
				
				$_SESSION['user']=$username;
				header('location:../admin_panel/admin_panel1.php');
			}
			else{
					echo "<script type='text/javascript'>alert('failed retry');window.location='index.php'</script>";
					
			}
		}


	

?>