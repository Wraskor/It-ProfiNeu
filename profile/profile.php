<html>
	<head>
		<meta charset="utf-8"/>
	</head>

	<body>

		<h1>Allgemeines</h1>
		<a href="profile.php">Allgemeines</a>
		<a href="profile_galerie.php">Galerie</a>
		<br>


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
			while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
				echo "<br>";
				echo "Anrede: " . $row['Anrede'] . "<br>";
				echo "Nachname: " . $row['Nachname'] . "<br>";
				echo "Vorname: " . $row['Vorname'] . "<br>";
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

	<pre>
		<?php print_r($row); ?>
	</pre>	
	</body>
</html>