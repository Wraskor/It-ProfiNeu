<?php session_start (); ?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>IT-Profi</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../css/main.css">

  </head>
  <body class="login">
  	 
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="title">
            <h1>IT-Profi</h1>
          </div>
          <div class="login-box">
            <h2>Login <small> Please login first or <a href="../register/registerPerson.php">register</a></h2>
            <br/>
            <form action="login.php" method="POST" role="form">
              <div class="form-group">
                <label class="label-control" for="loginEmail">Email address</label>
                <input type="email" class="form-control" id="loginEmail" name="email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label class="label-control" for="loginPassword">Password</label>
                <input type="password" class="form-control" id="loginPassword" name="pwd" placeholder="Password">
              </div>
                <?php 
                  if (isset ($_REQUEST["fehler"])) 
                  { 
                    echo "<p>Die Zugangsdaten waren ungültig.</p>"; 
                  } 
                ?>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>