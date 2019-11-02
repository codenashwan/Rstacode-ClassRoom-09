<?php
session_start();
ob_start();
$db = mysqli_connect('localhost' , 'root' , '' , 'suliresult');
if(isset($_SESSION['teacherid'])){
    $teacherid = $_SESSION['teacherid'];
}
$date_of_post = mysqli_real_escape_string($db , date("Y-M-D h:i A"));
$date_of_post = htmlspecialchars($date_of_post);

$db->query("SET NAMES 'utf8'");
$db->query("SET CHARACTER SET utf8");
ini_set('default_charset','UTF-8'); 

if(!$db){
    exit("Error Connect To Database");
    echo mysqli_error_connet();
}


?>