<h1>Suche nach Person</h1>
<a href="search_person.php">nach Person suchen...</a>
<br/>
<a href="search_company.php">nach Firma suchen...</a>
<?php

if(!isset($_GET['search'])){
?>
	<form action="<?=$_SERVER['PHP_SELF']?>" method="get">
		
		<label>
			<p>Berufsbezeichnung:</p>
			<input type="text" name="search_berufsbezeichnung" />
		</label>
		<br/>
		<label>
			<p>bisherige(r) Arbeitgeber</p>
			<input type="text" name="search_arbeitgeber" />
		</label>
		<br/>
		<label>
			<p>Ausbildung/Lehre</p>
			<input type="text" name="search_ausbildung" />
		</label>
		<br/>
		
			
		<p>Student</p>
		<label><input type="radio" name="search_student" value="keine" checked="checked" /> keine Angabe</label>
		<label><input type="radio" name="search_student" value="Ja" /> Ja</label>
		<label><input type="radio" name="search_student" value="Nein" /> Nein</label>
	
	
		<!--<input type="hidden" name="seite" value="<?=$_GET['seite']?>">-->
		
		<br/>
		
		<input class="button" type="submit" name="search" value="Suche"/>
		
	</form>

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