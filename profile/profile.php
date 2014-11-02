
		<!--
		<a href="profile.php">Allgemeines</a>
		<a href="profile_galerie.php">Galerie</a>

		-->
<html DOCTYPE!>
	<head>
		<title>It-Profi</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../css/main.css">
		<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css'>
	</head>
	<body>

		<?php

			// Session starten
			session_start ();

			// Systemeinstellungen 
			$id = "root"; 
			$pw = ""; 
			$host = "localhost"; 
			$database = "itprofi"; 
			$table = '';
			
			if($_SESSION['user_typ'] == 'person'){

				$table = "register_personal"; 

			}elseif($_SESSION['user_typ'] == 'company'){

				$table = "register_company"; 
			}
			// Connection
			$conn_id = mysql_connect($host,$id,$pw); 
			if(!mysql_select_db($database,$conn_id))
			{
			  die('Could not connect: ' . mysql_error());
			}

			// query machen und anzeigen
			$sql = 'SELECT * 
					FROM  ' . $table .
					' WHERE EMail LIKE "' . $_SESSION['user_email'] . '";';
			$result = mysql_query($sql); 
			?>
			
		<div class="container">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#">IT-Profi</a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <!--<li class="active"><a href="#">Link</a></li>
			        <li><a href="#">Link</a></li>
			      	-->
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3 col-md-offset-">
							<ul class="nav nav-pills nav-stacked poop">
	 							<li class="active"><a href="#">Link</a></li>
					        	<li><a href="#">Link</a></li>
					        	<li><a href="#">Link</a></li>
							</ul>
						</div>
						<div class="col-md-8">
							<h1>It-Profi</h1>
							<div class="profile">
								<div class="col-md-12">
									<img src="../platzhalter-passfoto.gif" class="img-responsive pull-right" alt="Responsive image">
								</div>
								<div class="col-md-5 col-xs-3 putt-down20">
									<ul class="list-unstyled">
										<li>
											Anrede
										</li>
										<li>
											Name
										</li>
										<br/>
										<li>
											Vorname
										</li>
										<br/>
										<li>
											Geburtstag
										</li>
										<br/>
										<li>
											Nationalität
										</li>
										<br/>
										<li>
											Email
										</li>
										<br/>
										<li>
											Telefon
										</li>
										<br/>
										<li>
											Strasse
										</li>
										<br/>
										<li>
											Ort
										</li>
										<br/>
										<li>
											Platz
										</li>
										<br/>
										<li>
											Geburtstag
										</li>
										<br/>
										<li>
											Student
										</li>	
									</ul>
								</div> 
								<div class="col-md-4 col-xs-3 putt-down20">
									<ul class="list-unstyled">
										<?php
											while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
												echo "<br>";
												echo $row['Anrede'] . "<br>";
												echo $row['Nachname'] . "<br>";
												echo "<li>".$row['Vorname'] . "</li><br>";
												echo "Geburtsdatum: " . $row['Geburtsdatum'] . "<br>";
												echo "Nationalität: " . $row['Nationalitaet'] . "<br>";
												echo "Telefon: " . $row['Telefon'] . "<br><br>";
												echo "Strasse: " . $row['Strasse'] . "<br>";
												echo "PLZ: " . $row['PLZ'] . "<br>";
												echo "Ort: " . $row['Ort'] . "<br><br><br>";
												echo "Berufsbezeichnung: " . $row['Berufsbezeichnung'] . "<br>";
												echo "Arbeitgeber: " . $row['Arbeitgeber'] . "<br>";
												echo "Ausbildung: " . $row['Ausbildung'] . "<br>";
												echo "Student: " . $row['Student'] . "<br>";
												if($row == false){
													break;
												}
											}
											mysql_close($conn_id);
										?>
										<li>
											<span class="glyphicon glyphicon-ok"></span>
										</li>
									</ul>
								</div>
								<br/>
								<br/>

								<div class="col-md-10">
									<h3>Berufsspezifischeinformationen</h3>
									<br/>
									<h5>Berufsbezeichnung</h5>
									<p>Informatiker Applikationsentwickler</p>
									<h5>Bisherige(r) Arbeitgeber</h5>
									<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
									<br/>
									<h5>Ausbildung/Lehre</h5>
									<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
									
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
			<br/>
			<div class="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<a href="http://twitter.com/minimalmonkey" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a>
							<a href="http://facebook.com" class="icon-button facebook"><i class="icon-facebook"></i><span></span></a>
							<a href="http://plus.google.com" class="icon-button google-plus"><i class="icon-google-plus"></i><span></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
	  	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.14/angular.js"></script>
  		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.14/angular-animate.js"></script>
  		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.14/angular-route.js"></script>


	</body>
</html>