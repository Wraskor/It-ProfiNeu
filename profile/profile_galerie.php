<!DOCTYPE html>

<html>
	<head>
		<script src="js/jquery-1.11.0.min.js"></script>
		<script src="js/lightbox.min.js"></script>
		<link href="css/lightbox.css" rel="stylesheet" />
	</head>
	<body>
		<h1>Galerie</h1>
		
		<a href="profile.php">Allgemeines</a>
		<a href="profile_galerie.php">Galerie</a>
		<br>

		<table border="0">
			<?php
			
				$dir_thumbs = 'thumbnails/';
				$dir_images = 'images/';
				$counter = 0;
				
				if($dh = opendir($dir_images)){
					
					while(($filename = readdir($dh)) !== false){
					
						if(filetype($dir_images . $filename) == 'file'){
						
							$img = @imagecreatefromjpeg($dir_images . $filename);
					
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
							
							$filename_lightbox = $filename;
						
							//Ändert den Dateinamen so das Umlaute, Dateitypen und Underscores ersetzt werden 
							$filename_lightbox = str_replace('.jpg', '', $filename_lightbox);
							$filename_lightbox = str_replace('ae', 'ä', $filename_lightbox);
							$filename_lightbox = str_replace('oe', 'ö', $filename_lightbox);
							$filename_lightbox = str_replace('ue', 'ü', $filename_lightbox);
							$filename_lightbox = str_replace('_', ' ', $filename_lightbox);
							$filename_lightbox = ucfirst($filename_lightbox);
							
							
							if($counter>=3){
								
								echo '<tr>';
								$counter = 0;
							
							}
							echo '<td >';
							echo "<a href='$dir_images$filename' data-lightbox='lager' data-title='$filename_lightbox'>
								  <img src='$dir_thumbs$filename' alt='$filename'/>
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
							
							if($counter>=3){
								
								echo '</tr>';
								$counter = 0;
							}
							
						}
					}
				
				}
				closedir($dh);
			?>
		</table>
				
				
	</body>
	
</html>

