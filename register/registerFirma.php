<?php
			
			$errors = array();
			if(count($_POST) > 0){

				if($_POST['name'] == ''){
					
					$errors ['name'] = 'Fuellen Sie Bitte das Feld "Name" ein.';
					
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
				if($_POST['dienstleistungen'] == ''){
					
					$errors ['dienstleistungen'] = 'Fuellen Sie Bitte das Feld "Dienstleistungen" aus.';
					
				}				
				if($_POST['suchenach'] == ''){

					$errors ['suchenach'] = 'Fuellen Sie Bitte das Feld "Auf der Suche nach.." aus.';
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
						<li><a href="registerPerson.php">Einzelperson</a></li> 
						<li class="active"><a  href="#">Firma</a></li>
					</ul>
					</div>
					<div class="register-box">
						<h2>Register <small> Please Register or <a href="../login/login.php">login</a></small></h2>
						<br/>											<!--Muss noch zu register.php#/firma geleitet werden -->
						<form class="form-horizontal" role="form" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
							<div <?php if(!isset($errors['name'])) echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
								<label class="col-sm-3 control-label" for="regfname">*Name der Firma</label>
								<div class="col-sm-9">
									<input type="text" name="name" id="regfname" placeholder="Name" <?php if(count($_POST) > 0) if($_POST['name'] != '') echo 'value="' . $_POST['name'] . '" '; else echo 'class="has-error" ';?> />
								</div>
							</div>
							<div class="form-group form-group-sm">
								<label class="col-sm-3 control-label"  for="refgtel" >Telefon</label>
								<div class="col-sm-9">
									<input name="tel" type="tel" id="refgtel" placeholder="Telefon"   <?php if(count($_POST) > 0) if($_POST['tel'] != '') echo 'value="' . $_POST['tel'] . '" '; else echo 'class="has-error" ';?>/>
								</div>
							</div>
							<div <?php  if(!isset($errors['strasse'])) echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
								<label class="col-sm-3 control-label" for="regstrasse">*Strasse</label>
								<div class="col-sm-9">
									<input type="text" name="strasse" id="regstrasse" placeholder="Musterstrasse 20" <?php if(count($_POST) > 0) if($_POST['strasse'] != '') echo 'value="' . $_POST['strasse'] . '" '; else echo 'class="has-error" ';?> />
								</div>
							</div>
							<div <?php  if(!isset($errors['plz'])) echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
								<label class="col-sm-3 control-label" for="regfplz">*PLZ</label>
								<div class="col-sm-9">
									<input type="text" name="plz" id="regfplz" placeholder="8400" <?php if(count($_POST) > 0) if($_POST['plz'] != '') echo 'value="' . $_POST['plz'] . '" '; else echo 'class="has-error" ';?> />
								</div>
							</div>
							<div <?php  if(!isset($errors['ort'])) echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
								<label class="col-sm-3 control-label" for="regfort">*Ort</label>
								<div class="col-sm-9">
									<input type="text" name="ort" id="regfort" placeholder="Winterthur" <?php if(count($_POST) > 0) if($_POST['ort'] != '') echo 'value="' . $_POST['ort'] . '" '; else echo 'class="has-error" ';?> />
								</div>
							</div>
							<div <?php  if(!isset($errors['email'])) echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
								<label class="col-sm-3 control-label" for="regfemail" >*E-mail</label>
								<div class="col-sm-9">
									<input name="email" id="regfemail" type="email" placeholder="muster@email.com"   <?php if(count($_POST) > 0) if($_POST['email'] != '') echo 'value="' . $_POST['email'] . '" '; else echo 'class="has-error"';?>/>
								</div>
							</div>
							<div <?php  if(!isset($errors['password'])) echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
								<label class="col-sm-3 control-label" for="regfpassword" >*Passwort</label>
								<div class="col-sm-9">
									<input  name="password" id="regfpassword" type="password" placeholder="*********"   <?php if(count($_POST) > 0) if($_POST['password'] != '') echo 'value="' . $_POST['password'] . '" '; else echo 'class="has-error"';?>/>
								</div>
							</div>
							<div class="form-group form-group-sm">
								<label class="col-sm-3 control-label" for="regbfild">Firmenlogo: </label>
								<div class="col-sm-9">
									<input type="file" name="profileimg" id="regfbild" placeholder="Name"/>
									<p class="help-block">Bitte Firmenlogo Oder Bild Ihrer Firma max ...x....</p>
								</div>
							</div>
							<div <?php  if(!isset($errors['dienstleistungen'])) echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
								<label class="col-sm-9 control-label" for="regdienst">*Beschreibung der Dienstleistungen</label>
								<div class="col-sm-11">
									<textarea name="dienstleistungen" id="regdienst" class="form-control" rows="3"><?php if(isset($_POST['dienstleistungen']))echo @$_POST['dienstleistungen']; ?> </textarea>
								</div>
							</div>
							<br>
							<div <?php  if(!isset($errors['suchenach'])) echo 'class="form-group form-group-sm"'; else echo 'class="form-group form-group-sm has-error" ';?>>
								<label class="col-sm-9 control-label" for="regsuchenach">*Auf der Suche nach...</label>
								<div class="col-sm-11">
									<textarea name="suchenach" id="regsuchenach" class="form-control" rows="3"><?php if(isset($_POST['suchenach']))echo @$_POST['suchenach']; ?></textarea>
								</div>
							</div>
							
						
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
					
					echo '<h3 class="error2" >Um das Formular korrekt abzusenden: </h3>';
					
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
					
					
					$name = $_POST['name'];
					$email = $_POST['email'];
					$password = $_POST['password'];
					$strasse = $_POST['strasse'];
					$plz = $_POST['plz'];
					$ort = $_POST['ort'];
					$tel = $_POST['tel'];
					$dienstleistungen = $_POST['dienstleistungen'];
					$suchenach = $_POST['suchenach'];

					// Systemeinstellungen 
					$id = "root"; 
					$pw = ""; 
					$host = "localhost"; 
					$database = "itprofi"; 
					$table = "register_company"; 

					// Einstellungen Ende 
					$conn_id = mysql_connect($host,$id,$pw); 
					mysql_select_db($database,$conn_id); 

					$sql_reg = "INSERT INTO ".
							$table . "(Name, EMail, Passwort, Telefon, Strasse, PLZ, Ort, Dienstleistungen, SucheNach) " .
							"VALUES('".	$name."', '". 
										$email."', '". 
										md5($password)."', '". 
										$tel."', '". 
										$strasse."', '". 
										$plz."', '". 
										$ort."', '". 
										$dienstleistungen."', '". 
										$suchenach. "')"; 
					mysql_query($sql_reg);
					$table = "login"; 
					$sql_log = "INSERT INTO ".
							$table . "(EMail, Kennwort, ProfilTyp) " .
							"VALUES('".$email."', '". 
										md5($password)."', '".
										'company'. "')"; 
					mysql_query($sql_log);
					$sql = "SELECT ".
					    "Id ".
					  "FROM ".
					    "login ".
					  "WHERE ".
					    "(EMail like '".$email."') AND ".
					    "(Kennwort = '".md5($password)."')";
					$result = mysql_query ($sql);

					while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
						$id = $row['Id'];						
						if($row == false){
							break;
						}
					}

					//profilbild speichern
					switch($_FILES['profileimg']['type']) {
							case 'image/jpeg':
								$type = "jpeg";
								break;
							case 'image/png':
								$type = "png";
								break;
							default:
								die('DIE3');
								break;
						}
					$imagename = $id . "_profileimg." . $type;
					@$_FILES['profileimg']['name'] = $imagename;
					$temp_name = @$_FILES['profileimg']['tmp_name'];
					$image = '../profile/profileimages/' . @$_FILES['profileimg']['name'];
					$thumb = '../profile/profilethumbnails/' . @$_FILES['profileimg']['name'];
				
					if(is_uploaded_file(@$_FILES['profileimg']['tmp_name'])){
						move_uploaded_file($temp_name, $image);
						//copy($dateiname, $thumb);
					
					//Original-Bild
					
						switch($_FILES['profileimg']['type']) {
							case 'image/jpeg':
								$img = imagecreatefromjpeg($image);
								break;
							case 'image/png':
								$img = imagecreatefrompng($image);
								break;
							default:
								die('DIE2');
								break;
						}
						
						//Höhe und Breite des Orinigal-Bild
						$width = imagesx($img);
						$height = imagesy($img);
						
					//Thumbnail von Original-Bild
						
						//Höhe und Breite des Orinigal-Bild
						$width2 = 150;
						$height2 = 150;
						
						$img2 = imagecreatetruecolor($width2, $height2);
						
						imagecopyresized($img2, $img, 0,0,0,0, $width2, $height2, $width, $height);
						
						switch($_FILES['profileimg']['type']) {
							case 'image/jpeg':
								imagejpeg($img2, $thumb);
								break;
							case 'image/png':
								imagepng($img2, $thumb);
								break;
							default:
								die('DIE1');
								break;
						}
						
					}
						
					session_start ();
					$_SESSION["user_id"] = $id;
					$_SESSION["user_email"] = $email;
					$_SESSION["user_typ"] = 'person';
 					header ("Location: ../profile/profile.php"); 

				}	
			?>		
			
		<?php 
			} 
		?>