<?php
error_reporting(0);
if($_GET['search_name']!=''){
		if($_GET['search_dienstleistungen']!='' || $_GET['search_suchenach']!=''){
			$query=$query . " Name REGEXP '^.*" . $_GET['search_name'] . ".*' AND";
		}
		else{
			$query=$query . " Name REGEXP '^.*" . $_GET['search_name'] . ".*'";
		}
}
if($_GET['search_dienstleistungen']!=''){
	if($_GET['search_suchenach']!=''){
		$query=$query . " Dienstleistungen REGEXP '^.*" . $_GET['search_dienstleistungen'] . ".*' AND";
	}
	else{
		$query=$query . " Arbeitgeber REGEXP '^.*" . $_GET['search_dienstleistungen'] . ".*'";
	}
}

if($_GET['search_suchenach']!=''){
		$query=$query . " SucheNach REGEXP '^.*" . $_GET['search_suchenach'] . ".*'";
}

$query = $query . ";";

$argument_count=0;
if ($_GET['search_name']!='')$argument_count++;
if ($_GET['search_dienstleistungen']!='')$argument_count++;
if ($_GET['search_suchenach']!='')$argument_count++;
if($argument_count==0){
	$query="SELECT * FROM register_company;";
}
error_reporting(E_ALL);
/*echo '<pre>';
print_r($_GET);
echo '</pre>';*/
?>
