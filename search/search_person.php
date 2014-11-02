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
	 							<li class="active"><a href="#">nach Peron suchen...</a></li>
					        	<li><a href="search_company.php">nach Firma suchen...</a></li>
					        	
							</ul>
						</div>
						<div class="col-md-8">
							<h1>Suche nach Person</h1>
							<?php

								if(!isset($_GET['search'])){
								?>
									<form class="form-horizontal" role="form" action="<?=$_SERVER['PHP_SELF']?>" method="get">
										
										<div class="form-group form-group-sm">
											<label class="col-sm-3 control-label" for="seberuf">Berufsbezeichnung</label> 
												<div class="col-sm-9">
													<input type="text" name="search_berufsbezeichnung" id="seberuf"/>
												</div>
										</div>
										<div class="form-group form-group-sm">
											<label class="col-sm-3 control-label" for="searbeitgeber">bisherige(r) Arbeitgeber</label> 
												<div class="col-sm-9">
													<input type="text" name="search_arbeitgeber" id="searbeitgeber"/>
												</div>
										</div>
										<br/>
										<div class="form-group form-group-sm">
											<label class="col-sm-3 control-label" for="seausbildung">Ausbildung/Lehre</label> 
												<div class="col-sm-9">
													<input type="text" name="search_ausbildung" id="seausbildung"/>
												</div>
										</div>
										<br/>
										
										<br/>
										
											
										<strong class="col-sm-3 control-label">Student</strong>
										<label class="radio-inline"> 
											<input type="radio" name="search_student" value="keine" checked="checked" /> keine Angabe
										</label>
										<label class="radio-inline"> 
											<input type="radio" name="search_student" value="Ja" /> Ja
										</label>
										<label class="radio-inline"> 
											<input type="radio" name="search_student" value="Nein" /> Nein
										</label>
										
									
									
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
	echo '<table>';
	$a=0;
	if(isset($_GET['search_berufsbezeichnung']) && $_GET['search_berufsbezeichnung']!=''){
		echo '<tr><td>Berufsbezeichnung:</td><td>' . ucfirst($_GET['search_berufsbezeichnung']) . '</td></tr>';
		$a++;
	}
	if(isset($_GET['search_arbeitgeber']) && $_GET['search_arbeitgeber']!=''){
		echo '<tr><td>bisherige(r) Arbeitgeber:</td><td>' . ucfirst($_GET['search_arbeitgeber']) . '</td></tr>';
		$a++;
	}
	if(isset($_GET['search_ausbildung']) && $_GET['search_ausbildung']!=''){
		echo '<tr><td>Ausbildung/Lehre:</td><td>' . ucfirst($_GET['search_ausbildung']) . '</td></tr>';
		$a++;
	}
	if(isset($_GET['search_student']) && $_GET['search_student']!='keine'){
		echo '<tr><td>Student:</td><td>' . ucfirst($_GET['search_student']) . '</td></tr>';
		$a++;
	}
	if($a==0){
		echo '<tr><td colspan="2">Keine Suchkriterien festgelegt!</td><tr>';
	}

	echo '</table><br/>';
	
	// Systemeinstellungen 
	$id = "root"; 
	$pw = ""; 
	$host = "localhost"; 
	$database = "itprofi"; 
	$table = "register_personal"; 

	$conn_id = mysql_connect($host,$id,$pw); 
	if(!mysql_select_db($database,$conn_id))
	{
	  die('Could not connect: ' . mysql_error());
	}
	 
	$query= "SELECT * FROM " . $table . " WHERE";
	require 'search_check_person.php';
	$result = mysql_query($query);
	if(!is_bool($result)){
		echo '<form action="' . $_SERVER['PHP_SELF'] . '"><input class="button" type="submit" name="back" value="Neue Suche"/></form>';
		echo '<table>';
		echo '<tr><th>Name</th><th>Vorname</th><th>E-Mail</th><th>Berufsbezeichnung</th><th>bisherig(e) Arbeitgeber</th><th>Ausbildung/Lehre</th><th>Student</th>';
		echo '</tr>';
		$such_ergebnisse = 0;
		while($rows = mysql_fetch_array($result, MYSQL_ASSOC)){
			echo '<td>' . $rows['Nachname'] . '</td>';
			echo '<td>' . $rows['Vorname'] . '</td>';
			echo '<td>' . $rows['EMail'] . '</td>';
			echo '<td>' . $rows['Berufsbezeichnung'] . '</td>';
			echo '<td>' . $rows['Arbeitgeber'] . '</td>';
			echo '<td>' . $rows['Ausbildung'] . '</td>';
			echo '<td>' . $rows['Student'] . '</td>';
			echo "</tr>\n\n";
			$such_ergebnisse++;
			if($rows == null){
				break;
			}
		}
		echo '<tr><th colspan=2>Suchergebnisse: ' . $such_ergebnisse . '</th>';
	echo '</table>';
	}else{
		echo "<br/><br/>Datenbank ist entweder leer oder ein Fehler ist aufgetreten.";
	}
}?>	
