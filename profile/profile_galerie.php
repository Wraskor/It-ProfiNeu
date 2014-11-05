<?php 
include ("../checkuser.php"); 
session_start();
if($_SESSION['user_typ'] == 'company'){ 
	header ("Location: profile.php"); 
}
?> 

<html DOCTYPE!>
	<head>
		<title>It-Profi</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../css/main.css">
		<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css'>
		<link href="css/lightbox.css" rel="stylesheet" />
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
	 							<li><a href="profile.php">Profil</a></li>
					        	<li class="active"><a href="#">Gallerie</a></li>
					        	
							</ul>
						</div>
						<div class="col-md-8">
							<h1>Galerie</h1>
							<div class="profile">
								<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
									<div class="form-group form-group-sm">
										<div class="col-sm-9">
											<input type="file" name="upload_img" id="regbild" placeholder="Name" />
											<p class="help-block">Bitte Passfoto Oder Bild Ihres Gesichtes max ...x....</p>
											<!--<pre>
												<?php print_r($_FILES); 

												?>
											</pre>-->
										</div>
										<input class="btn btn-default button" type="submit" value="Senden" />

									</div>
								</form>
								<?php
									
									@mkdir('thumbnails/' . $_SESSION['user_id']);
									@mkdir('images/' . $_SESSION['user_id']);

									$temp_name = @$_FILES['upload_img']['tmp_name'];
									$image = 'images/' . $_SESSION['user_id'] . '/' . @$_FILES['upload_img']['name'];
									$thumb = 'thumbnails/' . $_SESSION['user_id'] . '/' . @$_FILES['upload_img']['name'];
									
									if(is_uploaded_file(@$_FILES['upload_img']['tmp_name'])){
										move_uploaded_file($temp_name, $image);
										//copy($dateiname, $thumb);
									
									//Original-Bild
									
										switch($_FILES['upload_img']['type']) {
											case 'image/jpeg':
												$img = imagecreatefromjpeg($image);
												break;
											case 'image/png':
												$img = imagecreatefrompng($image);
												break;
											default:
												die('DIE');
												break;
										}
										
										//Höhe und Breite des Orinigal-Bild
										$width = imagesx($img);
										$height = imagesy($img);
										
									//Thumbnail von Original-Bild
										
										//Höhe und Breite des Orinigal-Bild
										$width2 = ($width/3);
										$height2 = ($height/3);
										
										$img2 = imagecreatetruecolor($width2, $height2);
										
										imagecopyresized($img2, $img, 0,0,0,0, $width2, $height2, $width, $height);
										
										switch($_FILES['upload_img']['type']) {
											case 'image/jpeg':
												imagejpeg($img2, $thumb);
												break;
											case 'image/png':
												imagepng($img2, $thumb);
												break;
											default:
												die('DIE');
												break;
										}
										
									}
								?>
								<table border="0" class="table">
									
									<?php

										$dir_thumbs = 'thumbnails/' . $_SESSION['user_id'] . '/';
										$dir_images = 'images/' . $_SESSION['user_id'] . '/';
										$counter = 0;
										
										if($dh = opendir($dir_images)){
											
											while(($filename = readdir($dh)) != false){
											
												if(filetype($dir_images . $filename) == 'file'){
												
													/*$img = @imagecreatefromjpeg($dir_images . $filename);
											
													//Höhe und Breite des Orinigal-Bild
														$width = @imagesx($img);
														$height = @imagesy($img);
														
													//Thumbnail von Original-Bild
														
													//Höhe und Breite des Orinigal-Bild
													$width2 = ($width/3);
													$height2 = ($height/3);
													
													$img2 = @imagecreatetruecolor($width2, $height2);
													
													@imagecopyresized($img2, $img, 0,0,0,0, $width2, $height2, $width, $height);
													
													@imagejpeg($img2, $dir_thumbs . $filename);
													
													*/$filename_lightbox = $filename;
												
													//Ändert den Dateinamen so das Umlaute, Dateitypen und Underscores ersetzt werden 
													$filename_lightbox = str_replace('.jpg', '', $filename_lightbox);
													$filename_lightbox = str_replace('ae', 'ä', $filename_lightbox);
													$filename_lightbox = str_replace('oe', 'ö', $filename_lightbox);
													$filename_lightbox = str_replace('ue', 'ü', $filename_lightbox);
													$filename_lightbox = str_replace('_', ' ', $filename_lightbox);
													$filename_lightbox = ucfirst($filename_lightbox);
													
													
													if($counter>=2){
														
														echo '<tr>';
														$counter = 0;
													
													}
													echo '<td >';
													echo "<a  href='$dir_images$filename' data-lightbox='lager' data-title='$filename_lightbox'>
														  <img class='img-rounded img-responsive' src='$dir_thumbs$filename' alt='$filename'/>
														  <br/>
														  <a/>";
													
													//Ändert den Dateinamen so das Umlaute, Dateitypen und Underscores ersetzt werden 
													/*$filename = str_replace('.jpg', '', $filename);
													$filename = str_replace('ae', 'ä', $filename);
													$filename = str_replace('oe', 'ö', $filename);
													$filename = str_replace('ue', 'ü', $filename);
													$filename = str_replace('_', ' ', $filename);
													$filename = ucfirst($filename);
													echo "<p>$filename<p/>";*/
													echo '</td>';
													$counter++;
													
													if($counter>=2){
														
														echo '</tr>';
														$counter = 0;
													}
													
												}
											}
										
										}
										closedir($dh);
									?>
								</table>
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
		
		<script src="js/jquery-1.11.0.min.js"></script>
		<script src="js/lightbox.min.js"></script>
	  	

	</body>
</html>