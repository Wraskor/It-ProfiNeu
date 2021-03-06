<?php 
include ("../checkuser.php"); 
?> 
<html DOCTYPE!>
	<head>
		<title>It-Profi</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../css/main.css">
		<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css'>
	</head>
	<body>
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
			        <li class="navlink"><a href="../profile/profile.php">Profil</a></li>
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
	 							<li><a href="search_person.php">nach Person suchen...</a></li>
					        	<li class="active"><a href="#">nach Firma suchen...</a></li>
					        	
							</ul>
						</div>
						<div class="col-md-8">
							<h1>Suche nach Firma</h1>
							<?php

								if(!isset($_GET['search'])){
								?>
									<form class="form-horizontal" role="form" action="<?=$_SERVER['PHP_SELF']?>" method="get">
										
										<div class="form-group form-group-sm">
											<label class="col-sm-3 control-label" for="sefirma">Name der Firma</label> 
												<div class="col-sm-9">
													<input type="text" name="search_name" id="sefirma"/>
												</div>
										</div>
										<div class="form-group form-group-sm">
											<label class="col-sm-3 control-label" for="sedienstleistung">Dienstleistungen</label> 
												<div class="col-sm-9">
													<input type="text" name="search_dienstleistungen" id="sedienstleistung"/>
												</div>
										</div>
										<br/>
										<div class="form-group form-group-sm">
											<label class="col-sm-3 control-label" for="sesuchenach">auf der Suche nach...</label> 
												<div class="col-sm-9">
													<input type="text" name="search_suchenach" id="sesuchenach"/>
												</div>
										</div>
										
										<!--<input type="hidden" name="seite" value="<?=$_GET['seite']?>">-->
										
										<br/>
										
										<input class="btn btn-default button" type="submit" name="search" value="Suche"/>
										
									</form>
							
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
	</body>
</html>

<?php }else{
	echo '<h2>Suchkriterien:</h2>';
	echo '<table class="table table-hover">';
	$a=0;
	if(isset($_GET['search_name']) && $_GET['search_name']!=''){
		echo '<tr><td>Berufsbezeichnung:</td><td>' . ucfirst($_GET['search_name']) . '</td></tr>';
		$a++;
	}
	if(isset($_GET['search_dienstleistungen']) && $_GET['search_dienstleistungen']!=''){
		echo '<tr><td>bisherige(r) Arbeitgeber:</td><td>' . ucfirst($_GET['search_dienstleistungen']) . '</td></tr>';
		$a++;
	}
	if(isset($_GET['search_suchenach']) && $_GET['search_suchenach']!=''){
		echo '<tr><td>Ausbildung/Lehre:</td><td>' . ucfirst($_GET['search_suchenach']) . '</td></tr>';
		$a++;
	}
	if($a==0){
		echo '<tr><td>Keine Suchkriterien festgelegt!</td><tr>';
	}

	echo '</table>';
	
	// Systemeinstellungen 
	$id = "root"; 
	$pw = ""; 
	$host = "localhost"; 
	$database = "itprofi"; 
	$table = "register_company"; 

	$conn_id = mysql_connect($host,$id,$pw); 
	if(!mysql_select_db($database,$conn_id))
	{
	  die('Could not connect: ' . mysql_error());
	}
	 
	$query= "SELECT * FROM " . $table . " WHERE";
	require 'search_check_company.php';
	$result = mysql_query($query);
	if(!is_bool($result)){
		echo '<div class="col-sm-12"';
		echo '<form class="form-group form-group-sm"" action="' . $_SERVER['PHP_SELF'] . '"><a class="btn btn-default" type="submit" name="back" href="search_company.php">Neue Suche</a></form>';
		echo '<br/><br/><table class="table table-hover">';
		echo '<tr><th>Name</th><th>E-Mail</th><th>Dienstleistungen</th><th>Scuhe nach</th>';
		echo '</tr>';
		$such_ergebnisse = 0;
		while($rows = mysql_fetch_array($result, MYSQL_ASSOC)){
			echo '<td>' . $rows['Name'] . '</td>';
			echo '<td>' . $rows['EMail'] . '</td>';
			echo '<td>' . $rows['Dienstleistungen'] . '</td>';
			echo '<td>' . $rows['SucheNach'] . '</td>';
			echo "</tr>\n\n";
			$such_ergebnisse++;
			if($rows == null){
				break;
			}
		}
		echo '<tr><th colspan=2>Suchergebnisse: ' . $such_ergebnisse . '</th>';
	echo '</table></div>';
	}else{
		echo "<br/><br/>Datenbank ist entweder leer oder ein Fehler ist aufgetreten.";
	}
}?>	
