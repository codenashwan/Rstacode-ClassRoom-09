<?php include 'includes/nav.php' ; 
if(isset($userid)){
if(isset($_SESSION['userid']) && isset($_GET['QX3SALN76m_8x1_9yQzPP'])){
if(isset($_GET['ARCGfYyYjn2U9'])){
$code = mysqli_real_escape_string($db , $_GET['ARCGfYyYjn2U9']);
$code = htmlspecialchars($code);
$teacher_id = mysqli_real_escape_string($db , $_GET['QX3SALN76m_8x1_9yQzPP']);
$teacher_id = htmlspecialchars($teacher_id);

$CheckSecurity = mysqli_query($db , "SELECT * FROM class WHERE teacher_id = $teacher_id AND code = $code AND stage = $stage ");
if(mysqli_num_rows($CheckSecurity) != 1){
    header("Location:index.php");
    exit();
}
$query = mysqli_query($db , "SELECT * FROM teachers WHERE id = $teacher_id");
if(mysqli_num_rows($query) == 1){
while($row = mysqli_fetch_assoc($query)){
$profile_img = $row['profile_img'];
$name = $row['name'];
?>
<div class="container mt-5">
    <div class="row ">
        <div class="col-sm m-2 bg-white radius-20 shadow-sm p-2 text-center">
            <span>
                <img src="upload/teachers/profile_images/<?php echo $profile_img;?>" class="rounded-circle shadow"
                    width="150">
                <h5><?php echo $name;?></h5>
                <h5><?php echo $row['level'];?></h5>
                <?php
    if(strlen($row['social_type']) > 0 || strlen($row['social_type']) > 0){?>
                <a href="<?php echo $row['social_link'];?>" target="_blank" class="text-primary m-2"><span
                        class="text-dark <?php echo $row['social_type'];?>"></span></a>
                <a href="<?php echo $row['social_link2'];?>" target="_blank" class="text-primary m-2"><span
                        class="text-dark <?php echo $row['social_type2'];?>"></span></a>
                <?php
    }
    ?>
            </span>
        </div>
    </div>
    <?php
}
}else{
  header("Location:index.php");
}
?>
    <?php
$query = mysqli_query($db ,"SELECT * FROM posts p JOIN teachers tc  ON p.teacher_id= tc.id JOIN class cl  ON p.class_id  = cl.id WHERE p.teacher_id = $teacher_id AND tc.id = $teacher_id AND cl.code = $code");
if(mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_assoc($query)){?>
    <div class="media shadow-sm bg-white mt-5 p-3">
        <img class="rounded-circle mr-3" src="upload/teachers/profile_images/<?php echo $profile_img;?>" width="50"
            height="50">
        <div class="media-body">
            <h5 class="mt-0"><?php echo $name;?></h5>
            <p class="text-muted"><?php echo $row['date_of_post'];?></p>
            <p style="text-align:right"><?php echo $row['description'];?></p>
            <?php
        if(strlen($row['file_url']) > 0){?>
            <a href="<?php echo $row['file_url'];?>" tagert="_blank"><span
                    class="float-right fa fa-file mb-4 dropdown-item-text text-primary"> (View Attachment)</span></a>
            <?php
        }
        ?>
            <br>
            <span class="fa fa-thumbs-up"> (12) </span>
            <span class="fa fa-comment ml-4"> (20) </span>
        </div>
    </div>
    <?php
}
}else{
    echo "<div class='text-dark mt-5 text-center'>NOTHING POST</div>";
}
?>
</div>
<div class="mt-5"></div>
<?php include 'includes/footer.php';?>
<?php
}else{
  header("Location:index.php");
}
}else{
    header("Location:index.php");
}
}else{
    header("Location:index.php");

}
?>