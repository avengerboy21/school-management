

<?php 
session_start(); 
if(!isset($_SESSION['user'])){
  
header('location:../mainpage/index.php');
} ?>
<!DOCTYPE html>
<html>
<head>
 <title>admin_panel_teacher</title>
 
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
  border-radius: 6px;
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
    background-image: linear-gradient(to left,rgba(0,0,0,1),rgba(0,0,0,0.7),rgba(0,0,20,1));
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

 <form action="ap.php" method="post">
  <div class="container">
    <h1>Teacher's Registration</h1>
    <p>Please fill in this form to create an account.</p>
    <hr >
    <div class="inner">
    <label><b>NAME :</b></label>
    <input type="text" placeholder="Enter Name" name="name" value=""><br>
    <label for="email"><b>Email :</b></label>
    <input type="text" placeholder="Enter Email" name="email" value="" required><br>

   
  <label for="gender"><b>Gender :</b></label>
  <input type="radio" name="Gender" value="m" checked>Male
  <input type="radio" name="Gender" value="f">Female
  <input type="radio" name="Gender" value="o">Other<br><br>
  
  <label for="dob"><b>Date of birth </b></label>
    <input type="text" placeholder="yyyy/mm/dd" name="dob" value="" required><br>
  <label for="doj"><b>Date of joining </b></label>
    <input type="text" placeholder="yyyy/mm/dd" name="doj" value="" required><br>
  <label for="tid"><b>Teacher's ID </b></label>
    <input type="number" placeholder="Enter TID" name="tid"  value="" required><br>
  <label for="handlingsubcode"><b>Handling subject code </b></label>
    <input type="number" placeholder="Enter subcode" name="handlingsubcode" value="" required><br>
  <label for="contact"><b>Contact </b></label>
    <input type="number" placeholder="Enter contact no." name="contact" value="" required><br>
  
  <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter Address line1" name="address" value="" required><br>
<label> <b>position:</b></label>
  <select name="position">
    <option value="p">principle</option>
    <option value="v">vice principle</option>
    <option value="t" selected>teacher</option>
  </select> <br>
  

  
    <input type="submit" class="registerbtn"name="submit" value="register">
  </div>
  </div>
</form>

</body>
</html>