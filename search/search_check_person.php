<?php
error_reporting(0);
if($_GET['search_berufsbezeichnung']!=''){
		if($_GET['search_student']!='keine'){
			$query=$query . " Berufsbezeichnung REGEXP '^.*" . $_GET['search_berufsbezeichnung'] . ".*' AND";
		}
		else{
			$query=$query . " Berufsbezeichnung REGEXP '^.*" . $_GET['search_berufsbezeichnung'] . ".*'";
		}
}
if($_GET['search_arbeitgeber']!=''){
	if($_GET['search_student']!='keine'){
		$query=$query . " Arbeitgeber REGEXP '^.*" . $_GET['search_arbeitgeber'] . ".*' AND";
	}
	else{
		$query=$query . " Arbeitgeber REGEXP '^.*" . $_GET['search_arbeitgeber'] . ".*'";
	}
}
if($_GET['search_ausbildung']!=''){
	if($_GET['search_student']!='keine'){
		$query=$query . " Ausbildung REGEXP '^.*" . $_GET['search_ausbildung'] . ".*' AND";
	}
	else{
		$query=$query . " Ausbildung REGEXP '^.*" . $_GET['search_ausbildung'] . ".*'";
	}
}

if($_GET['search_student']!='keine'){
		$query=$query . " Student REGEXP '^.*" . $_GET['search_student'] . ".*'";
}

$query = $query . ";";

$argument_count=0;
if ($_GET['search_berufsbezeichnung']!='')$argument_count++;
if ($_GET['search_arbeitgeber']!='')$argument_count++;
if ($_GET['search_ausbildung']!='')$argument_count++;
if ($_GET['search_student']!='keine')$argument_count++;
if($argument_count==0){
	$query="SELECT * FROM register_personal;";
}
error_reporting(E_ALL);
/*echo '<pre>';
print_r($_GET);
echo '</pre>';*/
?>
