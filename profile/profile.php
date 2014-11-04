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
			      <ul class="nav navbar-nav navbar-right">
			        <li class="navlink"><a href="../search/search_person.php">Suche</a></li>
			       	 <li class="navlink"><a href="../login/logout.php" type="submit">Logout</a></li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>

			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3 col-md-offset-">
							<ul class="nav nav-pills nav-stacked poop">
	 							<li class="active"><a href="#">Profil</a></li>
					        	<li><a href="profile_galerie.php">Gallerie</a></li>
					        	
							</ul>
						</div>
						<div class="col-md-8">
							<h1>Profil</h1>

						<?php if($_SESSION['user_typ'] == 'person'){ ?>
							<div class="profile">
								<div class="col-md-12">
									<img src="../platzhalter-passfoto.gif" class="img-responsive pull-right" alt="Responsive image">
								</div>
								<div class="col-md-5 col-xs-3 putt-down20">
									<ul class="list-unstyled">
										<li>
											Anrede
										</li>
										<br/>
										<li>
											Name
										</li>
										<br/>
										<li>
											Vorname
										</li>
										<br/>
										<li>
											E-Mail
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
											Telefon
										</li>
										<br/>
										<li>
											Strasse
										</li>
										<br/>
										<li>
											PLZ
										</li>
										<br/>
										<li>
											Ort
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
												echo "<li>" . $row['Anrede'] . "</li><br/>";
												echo "<li>" . $row['Nachname'] . "</li><br/>";
												echo "<li>" . $row['Vorname'] . "</li><br/>";
												echo "<li>" . $row['EMail'] . "</li><br/>";
												echo "<li>" . $row['Geburtsdatum'] . "</li><br/>";
												echo "<li>" . $row['Nationalitaet'] . "</li><br/>";
												echo "<li>" . $row['Telefon'] . "</li><br/>";
												echo "<li>" . $row['Strasse'] . "</li><br/>";
												echo "<li>" . $row['PLZ'] . "</li><br/>";
												echo "<li>" . $row['Ort'] . "</li><br/>";
												
												echo "<li>" . $row['Student'] . "</li><br>";
												if($row == false){
													break;
												}
											}
											
											// query neu machen
											$sql = 'SELECT * 
													FROM  ' . $table .
													' WHERE EMail LIKE "' . $_SESSION['user_email'] . '";';
											$result = mysql_query($sql); 
										?>
									</ul>
								</div>
								<br/>
								<br/>

								<div class="col-md-10">
									<h3>Berufsspezifischeinformationen</h3>
									<br/>
									<?php
											while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
												echo "<h5>Berufsbezeichnung</h5>";
												echo "<p>" . $row['Berufsbezeichnung'] . "</p><br/>";
												echo "<h5>Bisherige(r) Arbeitgeber</h5>";
												echo "<p>" . $row['Arbeitgeber'] . "</p><br/>";
												echo "<h5>Ausbildung/Lehre</h5>";
												echo "<p>" . $row['Ausbildung'] . "</p>";
												if($row == false){
													break;
												}
											}
											mysql_close($conn_id);
										?>
								</div>
							</div>

					<?php } elseif($_SESSION['user_typ'] == 'company'){ ?>
							<div class="profile">
								<div class="col-md-12">
									<img src="../platzhalter-passfoto.gif" class="img-responsive pull-right" alt="Responsive image">
								</div>
								<div class="col-md-5 col-xs-3 putt-down20">
									<ul class="list-unstyled">
										<li>
											Name
										</li>
										<br/>
										<li>
											E-Mail
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
											PLZ
										</li>
										<br/>
										<li>
											Ort
										</li>
										<br/>
										
									</ul>
								</div> 
								<div class="col-md-4 col-xs-3 putt-down20">
									<ul class="list-unstyled">
										<?php
											while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
												echo "<li>" . $row['Name'] . "</li><br/>";
												echo "<li>" . $row['EMail'] . "</li><br/>";
												echo "<li>" . $row['Telefon'] . "</li><br/>";
												echo "<li>" . $row['Strasse'] . "</li><br/>";
												echo "<li>" . $row['PLZ'] . "</li><br/>";
												echo "<li>" . $row['Ort'] . "</li><br/>";
												
												if($row == false){
													break;
												}
											}
											
											// query neu machen
											$sql = 'SELECT * 
													FROM  ' . $table .
													' WHERE EMail LIKE "' . $_SESSION['user_email'] . '";';
											$result = mysql_query($sql); 
											?>
									</ul>
								</div>
								<br/>
								<br/>

								<div class="col-md-10">
									<h3>Berufsspezifischeinformationen</h3>
									<br/>
									<?php
											while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
												echo "<h5>Dienstleistungen</h5>";
												echo "<p>" . $row['Dienstleistungen'] . "</p><br/>";
												echo "<h5>auf der Suche nach...</h5>";
												echo "<p>" . $row['SucheNach'] . "</p>";
												if($row == false){
													break;
												}
											}
											mysql_close($conn_id);
										?>
								</div>
							</div>

						<?php } ?>
			
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
		
		<script src="../bootstrap/js/bootstrap.min.js"></script>
	  	


	</body>
</html>