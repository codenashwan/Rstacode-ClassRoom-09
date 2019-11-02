<?php include 'includes/nav.php';
if(isset($teacherid)){
?>

<!-- Add Class -->
<div class="row">
  <div class="col-md-4">
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card bg-white shadow border-0">
            <p class="text-center">Create Class</p>
              <div class="card-body px-lg-5 py-lg-5">
                <form role="form" action="addclassproccess.php" method="post">
                  <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                      <input class="form-control" name="name" placeholder="Name Subject" type="text">
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                      <input class="form-control" name="code" placeholder="Name Subject" type="text" value="<?php echo mt_rand(1000,9999); ?>">
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <select name="stage" class="form-control">
                    <option value="">Stage</option>
                      <option value="1">First</option>
                      <option value="2">Second</option>
                      <option value="3">Third</option>
                      <option value="4">Fourth</option>
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <select name="descGallery" class="form-control">
                    <?php
                     $list = ['Type Your Subject','Programming','Computer','Education','Database','Mathematics','Psychology'];
                     echo '<option value="1">'.$list[0].'</option>';
                     for($i =1 ; $i<count($list) ; $i++){?>
                      <option value="name<?php echo $i;?>.jpg"><?php echo $list[$i];?></option>
                      <?php
                  }
                  ?>
                    </select>
                  </div>
                  <div class="text-center">
                    <button name="submit" class="btn btn-dark my-4 w-100">ADD</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Main Content -->
<?php
if(isset($_GET['delete_class']) && isset($_GET['code'])){
$classid = mysqli_real_escape_string($db , $_GET['delete_class']);
$classid = htmlspecialchars($classid);
$code = mysqli_real_escape_string($db , $_GET['code']);
$code = htmlspecialchars($code);
if(empty($classid) && empty($code)){
  header("Location:class.php");
}else{
  $query = mysqli_query($db , "DELETE FROM class WHERE `id` = '$classid' AND `code` = '$code' AND `teacher_id` = '$teacherid'");
  $query .= mysqli_query($db , "DELETE FROM join_class WHERE `classid` = '$classid' AND `code_class` = '$code'");
  $query .= mysqli_query($db , "DELETE FROM posts WHERE `teacher_id` = '$teacherid' AND `class_id` = '$classid'");
  if($query){
    header("Location:class.php");
  }else{
    header("Location:class.php");
  }
}
}
?>
<div class="container mt-5">
  <button class="btn btn-white text-dark w-100 " data-toggle="modal" data-target="#modal-form">ADD CLASS</button>
  <div class="row justify-content-center mt-5">
    <?php
  $query = mysqli_query($db , "SELECT * FROM class WHERE `teacher_id` = '$teacherid'");
  while($row = mysqli_fetch_assoc($query)) :?>
    <div class="card radius-20 shadow-lg m-2" style="width: 20rem;">
      <img src="../upload\teachers\subject_images/<?php echo $row['descGallery'];?>" class="card-img-top radius-20"
        alt="...">
      <div class="card-body text-left">
        <p class="text-dark h3"><?php echo $row['subject'];?></p>
        <a href="post.php?a2f2ed4f8ebc2=<?php echo $row['id'];?>" class="fa fa-plus fa-2x text-success" style="position:absolute;right:0;margin-right: 23px;margin-top:-71px"></a>
        <a href="absences.php?class_id=<?php echo $row['id'];?>&stage=<?php echo $row['stage'];?>" class="fa fa-user-times fa-2x text-warning" style="position:absolute;right:0;margin-right: 13px;margin-top:-34px"></a>
        <a href="#" class="fa fa-edit fa-2x text-primary" style="position:absolute;right:0;margin-right: 16px;margin-top:5px"></a>
        <a href="?delete_class=<?php echo $row['id'];?>&code=<?php echo $row['code'];?>" class="fa fa-remove fa-2x text-danger" style="position:absolute;right:0;margin-right: 22px;margin-top:35px"></a>
        <span>Code: <?php echo $row['code'];?></span><br>
        <span>Stage : <?php echo $row['stage'];?></span><br>
        <span>Students : <?php echo $row['num_students'];?></span><br>
      </div>
    </div>
    <?php
endwhile
?>
  </div>
</div>
<?php
}else{
  header("Location:index.php");
}
?>
<?php include '../includes/footer.php';?>