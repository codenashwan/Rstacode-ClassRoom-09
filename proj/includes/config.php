<?php
session_start();
ob_start();
$db = mysqli_connect('localhost' , 'root' , '' , 'suliresult');
if(isset($_SESSION['userid'])){
    $stage = $_SESSION['stage'];
    $userid = $_SESSION['userid'];
}
$db->query("SET NAMES 'utf8'");
$db->query("SET CHARACTER SET utf8");
ini_set('default_charset','UTF-8'); 

if(!$db){
    exit("Error Connect To Database");
    echo mysqli_error_connet();
}


?>