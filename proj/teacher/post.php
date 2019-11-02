<?php include 'includes/nav.php';
if(isset($teacherid)){
if(isset($_GET['a2f2ed4f8ebc2'])){
    $classid = mysqli_real_escape_string($db , $_GET['a2f2ed4f8ebc2']);
    $CheckSecurity = mysqli_query($db , "SELECT * FROM class WHERE `teacher_id` = '$teacherid' AND `id` = '$classid'");
    while($row = mysqli_fetch_assoc($CheckSecurity)){
        $teacher_id = $row['teacher_id'];
        $class_id = $row['id']; 
    }
    if($teacher_id !== $teacherid && $classid !== $class_id){
        header("Location:class.php");
        exit();
    }
?>
<?php


$errors = ['result' => ''];
if(isset($_POST['submit'])){
$description = mysqli_real_escape_string($db , $_POST['description']);
$description = htmlspecialchars($description);

if(empty($description)){
    $errors['result'] = "Fields is Empty";
}else{
    $query = mysqli_query($db , "INSERT INTO posts(`teacher_id`,`class_id`,`description`,`type_post`,`file_url`,`date_of_post`) VALUES ('$teacherid','$class_id','$description','','','$date_of_post')");
    if($query){
        header("Location:post.php?a2f2ed4f8ebc2=$class_id");
    }else{
        echo mysqli_error($db);
    }
}
}
if(isset($_GET['099af53f601'])){
    $postid = mysqli_real_escape_string($db , $_GET['099af53f601']);
    if(empty($postid)){
        header("Location:post.php?a2f2ed4f8ebc2=$class_id");
    }else{
        $query = mysqli_query($db , "DELETE FROM posts WHERE `id`  = '$postid'");
        if($query){
            header("Location:post.php?a2f2ed4f8ebc2=$class_id");
        }
    }
}
?>

<div class="container mt-5">
    <form action="post.php?a2f2ed4f8ebc2=<?php echo $classid;?>" method="post" class="media shadow-lg bg-white mt-5 mb-5 p-3 radius-20">
        <div class="media-body">
        <p class="text-center text-danger"><?php echo $errors['result'];?></p>
            <input type="text" name="description" placeholder="What is On Your Mind?" class="form-control shadow-sm border-0">
            <br>
            <span class="text-primary ml-4"><i class="fa fa-folder fa-1x"></i> Upload Link or image</span>
            <br>
            <br>
            <button name="submit" class="btn btn-primary w-100 radius-20">UPLOAD</button>
        </div>
    </form>
    <hr>
<?php 
$query = mysqli_query($db , "SELECT * FROM posts WHERE `class_id` = '$classid' AND `teacher_id` = '$teacherid' ORDER BY `date_of_post` DESC");
while($row = mysqli_fetch_assoc($query)){?>
    <div class="media shadow-lg bg-white mt-5 p-3 radius-20">
        <div class="media-body">
            <p class="text-muted"><?php echo $row['date_of_post'];?></p>
            <p style="text-align:center"><?php echo $row['description'];?></p>
            <?php
            if(strlen($row['type_post']) > 0){
                ?>
            <a href="<?php echo $row['file_url'];?>" tagert="_blank"><span class="float-right fa fa-file mb-4 dropdown-item-text text-primary">
                    (View Attachment)</span></a>
                    <?php
            }
            ?>
            <br>
           <a href="post.php?a2f2ed4f8ebc2=<?php echo $class_id;?>&099af53f601=<?php echo $row['id'];?>"><span class="fa fa-remove ml-4 text-danger"></span></a>
        </div>
    </div>
<?php
}
echo '</div>';
}else{
    header("Location:class.php");   
}
}else{
    header("Location:index.php");
}

?>