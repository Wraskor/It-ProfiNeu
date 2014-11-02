<!-- Registrierung Inhalt -->

		<?php
			
			$errors = array();
			if(count($_POST) > 0){
				
				
				if(!isset($_POST['anrede'])){
				
					$errors ['anrede'] = 'Waehlen Sie Bitte die Anrede aus.';
					
				}					
				if($_POST['name'] == ''){
					
					$errors ['name'] = 'Fuellen Sie Bitte das Feld "Name" ein.';
					
				}
				
				if($_POST['vorname'] == ''){
				
					$errors ['vorname'] = 'Fuellen Sie Bitte das Feld "Vorname" ein.';
				
				}
				if($_POST['bday'] == ''){
				
					$errors ['bday'] = 'Fuellen Sie Bitte das Feld "Geburtsdatum" ein.';
				
				}
				if($_POST['nationality'] == ''){
				
					$errors ['nationality'] = 'Fuellen Sie Bitte das Feld "Nationalität" ein.';
				
				}
				if($_POST['email'] == ''){
					
					$errors ['email'] = 'Fuellen Sie Bitte das Feld "E-Mail" ein.';
				
				}
				if($_POST['password'] == ''){
					
					$errors ['password'] = 'Fuellen Sie Bitte das Feld "Passwort" ein.';
				
				}
				if($_POST['strasse'] == ''){
				
					$errors ['strasse'] = 'Fuellen Sie Bitte das Feld "Strasse" ein.';
				
				}
				if($_POST['plz'] == ''){
					
					$errors ['plz'] = 'Fuellen Sie Bitte das Feld "PLZ" ein.';
				
				}
				if($_POST['ort'] == ''){
					
					$errors ['ort'] = 'Fuellen Sie Bitte das Feld "Ort" ein.';
				
				}


				if($_POST['berufsbezeichnung'] == ''){
					
					$errors ['berufsbezeichnung'] = 'Fuellen Sie Bitte das Feld "Berufsbezeichnung" aus.';
					
				}				
				if($_POST['arbeitgeber'] == ''){

					$errors ['arbeitgeber'] = 'Fuellen Sie Bitte das Feld "bisherige(r) Arbeitgeber" aus.';
				}					
				if($_POST['ausbildung'] == ''){

					$errors ['ausbildung'] = 'Fuellen Sie Bitte das Feld "Ausbildung/Lehre" aus.';
				}
				if(!isset($_POST['student'])){
				
					$errors ['student'] = 'Waehlen Sie Bitte aus, ob Sie ein Student sind.';
					
				}	
			}
		?>

		<?php
		
			if (count($_POST) == 0 || count($errors) > 0){
		
		?>
<html>
<!-- Registrierung Seite ohne Inhalt -->
	<head>
		<title>IT-Profi</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../css/main.css">
	</head>
	
	<body class="register">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 ">
					<div class="title">
						<h1>IT-Profi</h1>
					</div>
					<div>
					<ul class="nav nav-tabs nav Justified" role="tablist">
						<li class="active"><a href="#">Einzelperson</a></li> 
						<li><a href="registerFirma.php">Firma</a></li>
					</ul>
					</div>					
					<div class="register-box">
						<h2>Register <small> Please Register or <a href="../login/login.php">login</a></small></h2>
						<br/>												<!--Muss noch zu register.php#/person geleitet werden -->
						<form class="form-horizontal" role="form" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
								
								<strong  <?php if (isset($errors['anrede'])) echo 'class="col-sm-3 control-label has-error" '; else echo "class='col-sm-3 control-label'";?>>*Anrede</strong>
								<label class="radio-inline"> 
									<input type="radio" name="anrede" value="Frau" <?php if(isset($_POST['anrede'])) if($_POST['anrede'] == 'Frau') echo 'checked ' ;?>/>
									 Frau
									</label>
						
								<label class="radio-inline">
									<input type="radio" name="anrede" value="Herr" <?php if(isset($_POST['anrede'])) if($_POST['anrede'] == 'Herr') echo 'checked '; ?> />
									Herr
								</label>
							<br>
							<br>
							<div <?php if($errors['name'] == '') echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
								<label class="col-sm-3 control-label" for="regname">*Name</label>
								<div class="col-sm-9">
									<input type="text" name="name" id="regname" placeholder="Name" <?php if(count($_POST) > 0) if($_POST['name'] != '') echo 'value="' . $_POST['name'] . '" ';?> />
								</div>
							</div>
							<div <?php if($errors['vorname'] == '') echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
								<label class="col-sm-3 control-label" for="regvorname">*Vorname</label> 
								<div class="col-sm-9">
									<input type="text" name="vorname" id="regvorname" placeholder="Vorname" <?php if(count($_POST) > 0) if($_POST['vorname'] != '') echo 'value="' . $_POST['vorname'] . '" '; else echo 'class="has-error" ';?> />
								</div>
							</div>
							<div <?php if($errors['bday'] == '') echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
								<label class="col-sm-3 control-label" for="regbday">*Geburtsdatum</label> 
								<div class="col-sm-9">
									<input  type="date" name="bday"  id="regbday" placeholder="??.??.????" <?php if(count($_POST) > 0) if($_POST['bday'] != '') echo 'value="' . $_POST['bday'] . '" '; else echo 'class="has-error" ';?> />
								</div>
							</div>
							<div <?php if($errors['nationality'] == '') echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
								<label class="col-sm-3 control-label" for="regnati">*Nationalität</label> 
								<div class="col-sm-9">
									<input  type="text" name="nationality" placeholder="Schweiz"  id="regnati" <?php if(count($_POST) > 0) if($_POST['nationality'] != '') echo 'value="' . $_POST['nationality'] . '" '; else echo 'class="error" ';?>/>
								</div>
							</div>
							<div <?php if($errors['email'] == '') echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
								<label class="col-sm-3 control-label" for="regemail" >*E-mail</label>
								<div class="col-sm-9">
									<input name="email" id="regemail" type="email" placeholder="muster@email.com"   <?php if(count($_POST) > 0) if($_POST['email'] != '') echo 'value="' . $_POST['email'] . '" '; else echo 'class="has-error"';?>/>
								</div>
							</div>
							<div <?php if($errors['password'] == '') echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
								<label class="col-sm-3 control-label" for="regpassword" >*Passwort</label>
								<div class="col-sm-9">
									<input  name="password" id="regpassword" type="password" placeholder="*********"   <?php if(count($_POST) > 0) if($_POST['password'] != '') echo 'value="' . $_POST['password'] . '" '; else echo 'class="has-error"';?>/>
								</div>
							</div>
							<div <?php if($errors['tel'] == '') echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
								<label class="col-sm-3 control-label"  for="regtel" >Telefon</label>
								<div class="col-sm-9">
									<input name="tel" type="tel" id="regtel" placeholder="Telefon"   <?php if(count($_POST) > 0) if($_POST['tel'] != '') echo 'value="' . $_POST['tel'] . '" '; else echo 'class="has-error" ';?>/>
								</div>
							</div>
							<div <?php if($errors['strasse'] == '') echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
								<label class="col-sm-3 control-label" for="regstrasse">*Strasse</label>
								<div class="col-sm-9">
									<input type="text" name="strasse" id="regstrasse" placeholder="Musterstrasse 20" <?php if(count($_POST) > 0) if($_POST['strasse'] != '') echo 'value="' . $_POST['strasse'] . '" '; else echo 'class="has-error" ';?> />
								</div>
							</div>
							<div <?php if($errors['plz'] == '') echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
								<label class="col-sm-3 control-label" for="regplz">*PLZ</label>
								<div class="col-sm-9">
									<input type="text" name="plz" id="regplz" placeholder="8400" <?php if(count($_POST) > 0) if($_POST['plz'] != '') echo 'value="' . $_POST['plz'] . '" '; else echo 'class="has-error" ';?> />
								</div>
							</div>
							<div <?php if($errors['ort'] == '') echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
								<label class="col-sm-3 control-label" for="regort">*Ort</label>
								<div class="col-sm-9">
									<input type="text" name="ort" id="regort" placeholder="Winterthur" <?php if(count($_POST) > 0) if($_POST['ort'] != '') echo 'value="' . $_POST['ort'] . '" '; else echo 'class="has-error" ';?> />
								</div>
							</div>
							<div <?php if($errors['profileimg'] == '') echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
								<label class="col-sm-3 control-label" for="regbild">Profilbild: </label>
								<div class="col-sm-9">
									<input type="file" name="profileimg" id="regbild" placeholder="Name" <?php if(count($_POST) > 0) if($_POST['profileimg'] != '') echo 'value="' . $_POST['profileimg'] . '" '; else echo 'class="has-error" ';?> />
									<p class="help-block">Bitte Passfoto Oder Bild Ihres Gesichtes max ...x....</p>
								
								</div>
							</div>
							<br/>
							
							
							<h3>Berufsspezifische Infos</h3>
        					<br/>
        					<br/>
							<div <?php if($errors['berufsbezeichnung'] == '') echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
									<label class="col-sm-4 control-label" for="regberuf">*Berufsbezeichnung</label>
									<div class="col-sm-8">	
										<input ype="text" name="berufsbezeichnung" placeholder="Informatik Applikationsentwickler" id="regberuf" <?php if(count($_POST) > 0) if($_POST['berufsbezeichnung'] != '') echo 'value="' . $_POST['berufsbezeichnung'] . '" '; else echo 'class="has-error" ';?> />
									</div>
								</div>
								<br/>
							 	<div <?php if($errors['arbeitgeber'] == '') echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
									<label class="col-sm-8 control-label" for="regarbeitgeber">*bisherige(r) Arbeitgeber</label>
									<div class="col-sm-11">
										<textarea name="arbeitgeber" id="regarbeitgeber" class="form-control" rows="3"><?php if(isset($_POST['arbeitgeber']))echo @$_POST['arbeitgeber']; ?></textarea>
									</div>
								</div>
								<br/>
							 	<div <?php if($errors['ausbildung'] == '') echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
									<label class="col-sm-8 control-label" for="reglehre">*Ausbildung/Lehre</label>
									<div class="col-sm-11">
										<textarea name="ausbildung"  id="reglehre" class="form-control" rows="3"><?php if(isset($_POST['ausbildung']))echo @$_POST['ausbildung']; ?></textarea>
									</div>
								</div>
								<br/>
							 	<strong <?php if (isset($errors['anrede'])) echo 'class="col-sm-5 control-label has-error" '; else echo "class='col-sm-5 control-label'";?>>*Student</strong>
								<label class="radio-inline col-sm-1 "> 
									<input type="radio" name="student" value="Ja" <?php if(isset($_POST['student'])) if($_POST['student'] == 'Ja') echo 'checked ' ;?>/>
									Ja
								</label>
							
								<label class="radio-inline col-sm-3">
									<input type="radio" name="student" value="Nein" <?php if(isset($_POST['student'])) if($_POST['student'] == 'Nein') echo 'checked '; ?> />
									Nein
								</label>
								
							<br/>
							<br/>
							<br/>
						
							<h5>*  Obligatorisch!</h5>
							<input class="btn btn-default button" type="submit" value="Senden" />
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
	
 	 <script src="../bootstrap/js/bootstrap.js"></script>
 	 <script src="../javascript/app.js"></script>
 
</html>
		

			<?php
				if(count($errors) > 0){
					$dateityp = @GetImageSize($_FILES['profileimg']['tmp_name']);
						if($dateityp[2] != 0)
						   {

						   if($_FILES['profileimg']['size'] <  102400)
						      {
						      move_uploaded_file($_FILES['profileimg']['tmp_name'], "upload/".$_FILES['profileimg']['name']['vorname']);
						      echo "Das Bild wurde Erfolgreich nach upload/".$_FILES['profileimg']['name']." hochgeladen";
						      }

						   else
						      {
						         $errors ['profileimg'] = "Das Bild darf nicht größer als 100 kb sein";
						      }

						    }

						else
						    {
						    	$errors ['profileimg'] =  "Bitte nur Bilder im Gif bzw. jpg Format hochladen";
						    }

					echo '<h3 class="has-error" >Um das Formular korrekt abzusenden: </h3>';
					
					foreach ($errors as $error){
						echo '<p class="error2" >-' . $error . '<br/ ></p>';
					}
				
				}
				
			?>

		<?php 
			}
			else{
		?>
		
			<?php
				if(count($errors) == 0 && count($_POST) > 0){
					
					$anrede = $_POST['anrede'];
					

					$name = $_POST['name'];
					$vorname = $_POST['vorname'];
					$bday = $_POST['bday'];
					$nationality = $_POST['nationality'];
					$email = $_POST['email'];
					$password = $_POST['password'];
					$strasse = $_POST['strasse'];
					$plz = $_POST['plz'];
					$ort = $_POST['ort'];
					$tel = $_POST['tel'];

					$berufsbezeichnung = $_POST['berufsbezeichnung'];
					$arbeitgeber = $_POST['arbeitgeber'];
					$ausbildung = $_POST['ausbildung'];
					$student = $_POST['student'];


					// Systemeinstellungen 
					$id = "root"; 
					$pw = ""; 
					$host = "localhost"; 
					$database = "itprofi"; 
					$table = "register_personal"; 

					// Einstellungen Ende 
					$conn_id = mysql_connect($host,$id,$pw); 
					mysql_select_db($database,$conn_id); 

					$sql = "INSERT INTO ".
							$table . "(Anrede, Nachname, Vorname, Geburtsdatum, Nationalitaet, EMail, Passwort, Telefon, Strasse, PLZ, Ort, Berufsbezeichnung, Arbeitgeber, Ausbildung, Student) " .
							"VALUES('".$anrede."', '". 
										$name."', '". 
										$vorname."', '". 
										$bday."', '". 
										$nationality."', '". 
										$email."', '". 
										md5($password)."', '". 
										$tel."', '". 
										$strasse."', '". 
										$plz."', '". 
										$ort."', '". 
										$berufsbezeichnung."', '". 
										$arbeitgeber."', '". 
										$ausbildung."', '". 
										$student. "')"; 
					mysql_query($sql);
					$table = "login"; 
					$sql_log = "INSERT INTO ".
							$table . "(EMail, Kennwort, ProfilTyp) " .
							"VALUES('".$email."', '". 
										md5($password)."', '".
										'person'. "')"; 
					mysql_query($sql_log);
					session_start ();
					$_SESSION["user_id"] = 'none';
					$_SESSION["user_email"] = $email;
					$_SESSION["user_typ"] = 'person';
					include ("../login/intern.php"); 

				}	
			?>		
			
		<?php 
			} 
		?>
	