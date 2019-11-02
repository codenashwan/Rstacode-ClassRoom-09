<?php 
session_start();
include 'includes/config.php' ; 
if(isset($userid)){
$userid = $_SESSION['userid'];
if(isset($_POST['submit'])){
        $code = mysqli_real_escape_string($db , $_POST['code']);
        $code = htmlspecialchars($code);
        if(empty($code)){
            header("Location:index.php");
        }
        $check_join = mysqli_query($db, "SELECT * FROM join_class WHERE `userid` = '$userid' AND code_class='$code' LIMIT 1");
        if(mysqli_num_rows($check_join) > 0){
            header("Location:home.php");
        }else{
        $check = mysqli_query($db, "SELECT * FROM class WHERE `code`='$code' AND `stage`='$stage' LIMIT 1");
        if(mysqli_num_rows($check) > 0){
            while($row = mysqli_fetch_assoc($check)){
                $classid = $row['id'];
            }
            $query = mysqli_query($db , "INSERT INTO join_class (`userid`, `classid`,`code_class`) VALUES ('$userid', '$classid', '$code')");
            $query .=mysqli_query($db,"UPDATE class SET `num_students`= `num_students` + 1 WHERE `id` = '$classid' ");
            header("Location:index.php");
        }else{
            header("Location:index.php");
        }
}
}
}else{
    header("Location:index.php");
}
?>