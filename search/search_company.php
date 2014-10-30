<h1>Suche nach Firma</h1>
<a href="search_person.php">nach Person suchen...</a>
<br/>
<a href="search_company.php">nach Firma suchen...</a>
<?php

if(!isset($_GET['search'])){
?>
	<form action="<?=$_SERVER['PHP_SELF']?>" method="get">
		
		<label>
			<p>Name der Firma:</p>
			<input type="text" name="search_name" />
		</label>
		<br/>
		<label>
			<p>Dienstleistungen</p>
			<input type="text" name="search_dienstleistungen" />
		</label>
		<br/>
		<label>
			<p>auf der Suche nach...</p>
			<input type="text" name="search_suchenach" />
		</label>
		<br/>
			
		<!--<input type="hidden" name="seite" value="<?=$_GET['seite']?>">-->
		
		<br/>
		
		<input class="button" type="submit" name="search" value="Suche"/>
		
	</form>

<?php }else{
	echo '<h2>Suchkriterien:</h2>';
	echo '<table>';
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
		echo '<form action="' . $_SERVER['PHP_SELF'] . '"><input class="button" type="submit" name="back" value="Neue Suche"/></form>';
		echo '<table>';
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
	echo '</table>';
	}else{
		echo "<br/><br/>Datenbank ist entweder leer oder ein Fehler ist aufgetreten.";
	}
}?>	
