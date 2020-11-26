

<?php 
session_start(); 
if(!isset($_SESSION['user'])){
  
header('location:../mainpage/index.php');
} ?>
<!DOCTYPE html>
<html>
<head>
 <title>student details</title>
 
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
	
  padding: 200px 300px;
  padding-bottom:100%;
  background-image: linear-gradient(to left,rgba(18,203,196,0.5),rgba(6,82,221,0.4),rgba(18,203,196,0.5));
 position: relative;
}
.container:before {
  content: '';
  background: url("../mainpage/image.jpg") no-repeat center center/cover;
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
  .inner{
  	background: white;
    padding:0;
    width: 100%;
  	
  }
  .table{
    border: 6px;
    
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
   <li><a href="sms.php">home page</a></li>
 
  </ul>
 </div>


<div class="container" >
	<div class="inner">
	<table class="table table-bordered datatable" id="table-1" border=1>
			<thead>
				<tr><h2>
					<th>sname</th>
					<th>sid</th>
					<th>attendance</th>
					<th>gender</th>
					<th>dob</th>
					<th>address</th>
					<th>std</th>
					<th>sec</th>
          <th>dop</th>
					<th>Action</th></h2>
				</tr>
			</thead>
			<tbody>

            <?php
            $conn=new mysqli('localhost','root','','schoolmanagement');
              $query3 = "select * from student ORDER BY sid";
              $result2 = mysqli_query($conn, $query3);
              if (mysqli_affected_rows($conn) != 0) {
                  while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                      $sid   = $row['sid'];
                      $query4  = "select * from account WHERE sid='$sid'";
                      $result4 = mysqli_query($conn, $query4);
                      if (mysqli_affected_rows($conn) == 1) {
                          while ($row1 = mysqli_fetch_array($result4, MYSQLI_ASSOC)) {
                              
                              

                              echo "<tr><td>" . $row['sname'] . "</td>";
                              echo "<td>" . $row1['sid'] . "</td>";
                              echo "<td>" . $row['attendance'] . "</td>";

                              echo "<td>" . $row['gender'] . "</td>";

                              echo "<td>" . $row['dob'] . "</td>";

                              echo "<td>" . $row['address'] . "</td>";
                              echo "<td>" . $row['std'] . "</td>";
                              echo "<td>" . $row['sec'] . "</td>";
                              echo "<td>" . $row1['dop'] . "</td></tr>";
                     
                           
                          }
                      }
                  }
              }
            ?>                  
          </tbody>
        </table>
       
			</div>
</div>

</body>
</html>