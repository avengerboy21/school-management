

<?php 
session_start(); 
if(!isset($_SESSION['user'])){
  
header('location:../mainpage/index.php');
} ?>
<!DOCTYPE html>
<html>
<head>
 <title>admin_panel_teacher_entry</title>
 
 <style type="text/css">
  @import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";
  body {
  margin: 0;
  padding: 0;
  font-family: Arial, Helvetica, sans-serif;

  
}
* {
   
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  
  padding: 200px 200px;
  padding-bottom:100%;
  background-image: linear-gradient(to left,rgba(18,203,196,0.5),rgba(6,82,221,0.4),rgba(18,203,196,0.5));
 position: relative;
 width: 100%;
}
.container:before {
  content: '';
  background: linear-gradient(to left,rgba(18,203,196,0.5),rgba(6,82,221,0.4),rgba(18,203,196,0.5));
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
 
}


/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */

h1{
  text-align: center;
}
p{
  
  text-align: center;

}

  #sidebar{
   position: fixed;
   width: 200px;
   height: 100%;
   background: #151719;
   left: -200px;
   transition: all 500ms linear;
   z-index: 1;
  }
  #sidebar.active{
   left:0px;

  }
  #sidebar ul li{
   color: rgba(230,230,230,0.9);
   list-style: none;
   padding: 15px 10px;
   border-bottom: 1px solid rgba(100,100,100,0.3);

  }
  #sidebar .toggle-btn{
   position: absolute;
   left: 230px;
   top: 20px;
  }
  #sidebar .toggle-btn span{
   display: block;
   width: 30px;
   height: 5px;
   background: #151719;
   margin: 5px 0px;

  }
  a{
    text-decoration: none;
    font-family: 'Roboto', sans-serif;

    color: skyblue;
  }
   .content-table {
    background: white;
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}
.content-table th,
.content-table td {
  padding: 12px 15px;
}
.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}
.a1-btn{


   background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 6px;
}
 </style>
 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 <script type="text/javascript">
  function toggleSidebar(){
   document.getElementById("sidebar").classList.toggle('active');
  }
 </script>

</head>
<body>
     
<div id="sidebar">
  <div class="toggle-btn" onclick="toggleSidebar()"><a>
   <span></span>
   <span></span>
   <span></span>
  </a>
  </div>
  <ul>
   <li><a href="admin_panel1.php">STUDENT'S REGISRATION</a></li>
   <li><a href="admin_panel.php">TEACHER'S REGISTRATION</a></li>
   <li><a href="admin_panel2.php">TEACHER'S ENTRY</a></li>
   <li><a href="admin_panel3.php">STUDENTS'S ENTRY</a></li>
   <li><a href="../mainpage/logout.php">logout</a></li>
  </ul>
 </div>


<div class="container" >
  
  <table class="content-table" >
      <thead>
        <tr><h2>
          <th>tid   </th>
          <th>tname   </th>
          <th>dob   </th>
          <th>doj   </th>
          <th>contact  </th>
          <th>address  </th>
          <th>gender   </th>
          <th>position  </th>
          <th>email  </th>
          <th>scode  </th>
          <th>action   </th></h2>
        </tr>
      </thead>
      <tbody>

						<?php
						$conn=new mysqli('localhost','root','','schoolmanagement');
							$query  = "select * from teacher ORDER BY doj";
							$result = mysqli_query($conn, $query);
							if (mysqli_affected_rows($conn) != 0) {
							    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							        $tid   = $row['tid'];
							        $query1  = "select * from teacher WHERE tid='$tid'";
							        $result1 = mysqli_query($conn, $query1);
							        if (mysqli_affected_rows($conn) == 1) {
							            while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
							                
							                

							                echo "<tr><td>" . $row1['tid'] . "</td>";
							                
							                echo "<td>" . $row['tname'] . "</td>";

							                echo "<td>" . $row['dob'] . "</td>";

							                echo "<td>" . $row['doj'] . "</td>";

							                echo "<td>" . $row['contact'] . "</td>";
							                echo "<td>" . $row['address'] . "</td>";
							                echo "<td>" . $row['gender'] . "</td>";
							                echo "<td>" . $row['position'] . "</td>";
							                echo "<td>" . $row['email'] . "</td>";

							                echo "<td>" . $row['scode'] ."</td>";
							                
							                echo "<td><form action='teacher_update.php' method='post'><input type='hidden'  name='name' value='" . $tid . "'/><input type='submit' class='a1-btn a1-green' id='button1' value='Edit' class='btn btn-warning'/></form><form action='del_teacher.php' method='post' onsubmit='return ConfirmDelete()'><input type='hidden' name='name' value='" . $tid . "'/><input type='submit' value='Delete' width='20px' id='button1' class='a1-btn a1-orange'/></form></td></tr>";
							       
							             
							            }
							        }
							    }
							}
						?>									
					</tbody>
				</table>
				<script>
	
	function ConfirmDelete(name){
	
    var r = confirm("Are you sure! You want to Delete this User?");
    if (r == true) {
       return true;
    } else {
        return false;
    }
}

</script>
      
</div>

</body>
</html>