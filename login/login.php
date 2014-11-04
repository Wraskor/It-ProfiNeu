<?php
// Session starten
session_start ();
 $_SESSION["ungueltig"] = false;
  
// Datenbankverbindung aufbauen
$connectionid = mysql_connect ("localhost", "root", "");
if (!mysql_select_db ("ItProfi", $connectionid))
{
  die ("Keine Verbindung zur Datenbank");
}

$sql = "SELECT ".
    "Id, EMail, ProfilTyp ".
  "FROM ".
    "login ".
  "WHERE ".
    "(EMail like '".$_REQUEST["email"]."') AND ".
    "(Kennwort = '".md5 ($_REQUEST["pwd"])."')";
$_SESSION['sqls'] = $sql;
$result = mysql_query ($sql);

if (mysql_num_rows ($result) > 0){
  // login in ein Array auslesen.
  while($data = mysql_fetch_array ($result)){
  
  // Sessionvariablen erstellen und registrieren
  $_SESSION["user_id"] = $data["Id"];
  $_SESSION["user_email"] = $data["EMail"];
  $_SESSION["user_typ"] = $data["ProfilTyp"];
  }
  header ("Location: ../profile/profile.php");
}
else
{
  $_SESSION["ungueltig"] = true;
  session_unset (); 
  session_destroy (); 
  header ("Location: formular.php?fehler=1");
}
?>
