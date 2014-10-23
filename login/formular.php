<?php session_start (); ?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>IT-Profi</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../login/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../login/css/main.css">

  </head>
  <body class="login">
  	<?php 
			if (isset ($_REQUEST["fehler"])) 
			{ 
			  echo "Die Zugangsdaten waren ungültig."; 
			} 
		?> 
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="title">
            <h1>IT-Profi</h1>
          </div>
          <div class="login-box">
            <h2>Login <small> Please login first or <a href="./register/register.php">register</a></h2>
            <br/>
            <form action="login.php" method="POST" role="form">
              <div class="form-group">
                <label class="label-control" for="loginEmail">Email address</label>
                <input type="email" class="form-control" id="loginEmail" name="email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label class="label-control" for="loginPassword">Password</label>
                <input type="password" class="form-control" id="loginPassword" name="pdw" placeholder="Password">
              </div>
                <label>
                  <input type="checkbox"> Check me out
                </label>
                <br/>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>