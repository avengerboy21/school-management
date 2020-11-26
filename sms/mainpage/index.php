
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
   
  </head>
  <body>
  	<header class="showcase">
<div class="login-box">
  <h1>Login</h1>
  <div class="textbox">
    <form action="loginphp.php" method="POST">
    <i class="fas fa-user"></i>
    <input type="text" placeholder="Username" name="user" value="" required>
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" placeholder="Password" name="pass" value="" required>
  </div>

  <input type="submit" name="submit" class="btn" value="Sign in">
  </form>
  
  <a href="sms.php" > HOME</a>

</div>
</header>
  </body>
</html>
