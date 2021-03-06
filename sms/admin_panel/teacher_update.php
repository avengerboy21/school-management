

<?php 
session_start(); 
if(!isset($_SESSION['user'])){
  
header('location:../mainpage/index.php');
} ?>
<!DOCTYPE html>
<html>
<head>
 <title>teacher_update_panel</title>
 
 <style type="text/css">
  @import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";
  body {
  margin: 0;
  padding: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: skyblue;
}
* {
  
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 100px 400px;
  background-image: linear-gradient(to left,rgba(18,203,196,0.5),rgba(6,82,221,0.4),rgba(18,203,196,0.5));
 
}
  .inner{
padding-top: 20px;
    background: white;
    padding-left: 40px;
    
    
    border-radius: 6px;
  }

/* Full-width input fields */
input[type=text] {
  width: 25%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #e6ffff;
}
input[type=number] {
  width: 25%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #e6ffff;
  border-radius: 6px;
}
input[type=text]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
  width: 80%;
}

/* Set a style for the submit button */
.registerbtn {
   background-image: linear-gradient(to left,rgba(18,203,196,0.75),rgba(6,82,221,0.7),rgba(18,203,196,0.75));
  color: white;
  padding: 16px 20px;
  margin: 8px 500px;
  border: none;
  cursor: pointer;
  width: 15%;
  opacity: 0.9;
  border-radius: 6px;

}

.registerbtn:hover {
  background-position: right;
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

 <form action="update_t.php" method="post">
  <div class="container">
    <h1>Teacher's Registration</h1>
    <p>Please fill in this form to create an account.</p>
    <hr >
    <?php
            $host     = "localhost"; // Host name 
          $username = "root"; // Mysql username 
              $password = ""; // Mysql password 
            $db_name  = "schoolmanagement"; // Database name 

// Connect to server and select databse.
          $con = mysqli_connect($host, $username, $password, $db_name);


            $msgid = $_POST['name'];
            $query  = "SELECT * FROM teacher
                   WHERE tid='$msgid'";
            //echo $query;
            $result = mysqli_query($con, $query);
            $name="";
            $gender="";


            if (mysqli_affected_rows($con) == 1) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
                    $name    = $row['tname'];
                    $gender =$row['gender'];
                    $contact = $row['contact'];
                    $email   = $row['email'];
                    $dob   = $row['dob'];         
                    $doj    = $row['doj'];
                    $address=$row['address'];
                    $position=$row['position'];
                    $subcode=$row['scode'];                    
                }
            }
            else{
               echo "<html><head><script>alert('Change Unsuccessful');</script></head></html>";
               echo mysqli_error($con);
            }


        ?>
        <div class="inner">
    <label><b>NAME :</b></label>
    <input type="text" placeholder="Enter Name" name="name" value="<?php echo $name?>"><br>
    <label for="email"><b>Email :</b></label>
    <input type="text" placeholder="Enter Email" name="email" value="<?php echo $email?>" required><br>

   
  <label for="gender"><b>Gender :</b></label>
  <input type="radio" name="Gender" <?php if($gender == 'm'){echo "checked=checked";}?>value="m">Male
  <input type="radio" name="Gender" <?php if($gender == 'f'){echo "checked=checked";}?>value="f">Female
  <input type="radio" name="Gender" <?php if($gender == 'o'){echo "checked=checked";}?>value="o">Other<br><br>
  
  <label for="dob"><b>Date of birth </b></label>
    <input type="text" placeholder="yyyy/mm/dd" name="dob" value="<?php echo $dob?>" required><br>
  <label for="doj"><b>Date of joining </b></label>
    <input type="text" placeholder="yyyy/mm/dd" name="doj" value="<?php echo $doj?>" required><br>
  <label for="tid"><b>Teacher's ID </b></label>
    <input type="number" placeholder="Enter TID" name="tid"  value="<?php echo $msgid?>" required><br>
  <label for="handlingsubcode"><b>Handling subject code </b></label>
    <input type="number" placeholder="Enter handling subcode" name="handlingsubcode" value="<?php echo $subcode?>" required><br>
  <label for="contact"><b>Contact </b></label>
    <input type="number" placeholder="Enter contact no." name="contact" value="<?php echo $contact?>" required><br>
  
  <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter Address line1" name="address" value="<?php echo $address?>" required><br>
<label> <b>position:</b></label>
  <select name="position">
    <option <?php if($position == 'p'){echo("selected=selected");}?>value="p">principle</option>
    <option <?php if($position == 'v'){echo("selected=selected");}?>value="v">vice principle</option>
    <option <?php if($position == 't'){echo("selected=selected");}?>value="t" >teacher</option>
  </select> <br>
  

  
    <input type="submit" class="registerbtn"name="submit" value="update">
  </div>
  </div>
</form>

</body>
</html>