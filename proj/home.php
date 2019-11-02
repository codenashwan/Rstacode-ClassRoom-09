<?php include 'includes/nav.php' ; 
if(isset($userid)){
?>
<div class="container">
  <div class="row  justify-content-center ">
    <?php
if(isset($_GET['delete']) && isset($_GET['classid']) && isset($_GET['code'])){
  $join_id = mysqli_real_escape_string($db, $_GET['delete']);
  $join_id = htmlspecialchars($join_id);
  $classid = mysqli_real_escape_string($db, $_GET['classid']);
  $classid = htmlspecialchars($classid);
  $code = mysqli_real_escape_string($db, $_GET['code']);
  $code = htmlspecialchars($code);
  if(empty($join_id)){
    header("Location:index.php");
    exit();
  }
  $query = mysqli_query($db , "DELETE FROM join_class WHERE `join_id` = '$join_id' AND `userid` = '$userid' AND `classid` = '$classid' ");
  $query .= mysqli_query($db , "UPDATE class SET `num_students` = `num_students`-1 WHERE `id` = '$classid' AND `code` = '$code' AND `stage` = '$stage'");
  if($query){
    header("Location:index.php");
  }
}
$query = mysqli_query($db ,"SELECT * FROM class u JOIN join_class uc ON u.id=uc.classid JOIN teachers cl ON cl.id =u.teacher_id WHERE userid = $userid AND uc.code_class = u.code");
while($row = mysqli_fetch_assoc($query)){?>
    <div class="d-flex justify-content-center m-3">
      <div class="card mt-5 shadow-lg radius-20 border-0" style="width: 20rem">
        <a href="?delete=<?php echo $row['join_id'];?>&classid=<?php echo $row['classid'];?>&code=<?php echo $row['code'];?>"><img src="assets/img/remove.svg" width="20" class="m-2"
            style="position:absolute"></a>
        <img src="upload/teachers/subject_images/<?php   echo $row['descGallery'];?>" class="card-img-top radius-20">
        <img src="upload/teachers/profile_images/<?php echo $row['profile_img'];?>" class="rounded-circle m-2 shadow-lg"
          style="position:absolute;right:0;top:117px" width="70" height="70">
        <div class="card-body">
          <h6 class="card-subtitle mb-2 text-muted"><?php   echo $row['name'];?></h6>
          <h6 class="card-subtitle mb-2 text-muted"><?php   echo $row['subject'];?></h6>
          <h6 class="card-subtitle mb-2 text-muted"><?php   echo $row['num_students'];?> Students</h6>
          <h6 class="card-subtitle mb-2 text-muted">Code : <?php   echo $row['code'];?></h6>
          <a href="more.php?ARCGfYyYjn2U9=<?php echo $row['code'];?>&4sk3QzPPwJB&QX3SALN76m_8x1_9yQzPP=<?php echo $row['teacher_id'];?>&3lndnc"
            class="text-decoration-none">
            <div class="p-2 text-center mt-3 shadow-sm">More</div>
          </a>
        </div>
      </div>
    </div>
    <?php
}
?>
  </div>
</div>
<?php include 'includes/footer.php';?>
<?php
}else{
    header("Location:index.php");
}
?>