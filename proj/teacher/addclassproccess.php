<?php include 'includes/config.php';
if(isset($teacherid)){
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($db , $_POST['name']);
    $name= htmlspecialchars($name);

    $code = mysqli_real_escape_string($db , $_POST['code']);
    $code= htmlspecialchars($code);

    $stage = mysqli_real_escape_string($db , $_POST['stage']);
    $stage= htmlspecialchars($stage);

    $descGallery = mysqli_real_escape_string($db , $_POST['descGallery']);
    $descGallery= htmlspecialchars($descGallery);

    if(empty($name) || empty($code) || empty($stage) || empty($descGallery)){
        header("Location:class.php");   
        exit();   
    }else
    if(strlen($code) < 4){
        header("Location:class.php");
        exit();
    }else if(strlen($name) < 3){
        header("Location:class.php");
        exit();
    }else{
    $checkClass = mysqli_query($db , "SELECT * FROM class WHERE `code` = '$code' ");
    if(mysqli_num_rows($checkClass) == 1){
        header("Location:class.php");
         exit();   
    }else{
    $query = mysqli_query($db , "INSERT INTO class(`teacher_id`,`code`,`subject`,`stage`,`num_students` , `descGallery`) VALUES ('$teacherid','$code','$name','$stage',0,'$descGallery')");
    if($query){
        header("Location:class.php");
        exit();   
    }else{
        header("Location:class.php");
        exit();   
        }
        }
    }
    }else{
    header("Location:index.php");   
    }
    }else{
    header("Location:index.php");
    }