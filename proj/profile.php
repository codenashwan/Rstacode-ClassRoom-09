<?php include 'includes/nav.php' ; 
if(isset($_SESSION['userid'])){?>
<div class="container">
  <?php 
  if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($db , $_POST['username']);
    $username = htmlspecialchars($username);

    if(empty($username)){
      header("Location:profile.php");
    }else{
      $query =mysqli_query($db,"UPDATE students SET `username`= '$username' WHERE `id` = '$userid'");
      if($query){
        header("Location:profile.php");
      }
    }
  }
$query = mysqli_query($db, "SELECT * FROM students WHERE `id` = '$userid' ");
while($row = mysqli_fetch_assoc($query)){?>
  <!-- Change Username Modal -->
  <div class="modal fade" id="modal-default-username" tabindex="-1" role="dialog" aria-labelledby="modal-default"
    aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <form class="p-4 text-center" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
              <input type="text" name="username" class="form-control border-0 p-4 w-100 shadow-sm mb-3"
                placeholder="New Username">
            </div>
            <button type="submit" name="submit" class="btn btn-dark border-0 w-100 p-2">Change</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Details -->
  <div class="d-flex align-items-end flex-column shadow-sm  mt-5 p-3 bg-white">
    <h4>ناوی سیانی : <?php echo $row['fullname'];?></h4>
    <h4>ناوی بەکارهێنەر : <?php echo $row['username'];?> <img class="mb-1" data-toggle="modal"
        data-target="#modal-default-username" src="assets/img/edit.svg" width="15" style="cursor:pointer"> </h4>
    <h4>بەش : <?php echo $row['department'];?></h4>
    <h4>کۆلێژ : <?php echo $row['college'];?></h4>
    <h4>قۆناغ : <?php echo $row['stage'];?></h4>
    <h4>گروپ : <?php echo $row['class'];?></h4>
  </div>
  <?php }?>
  <style>
    h4 {
      direction: rtl !important;
      text-align: right !important;
    }
  </style>
</div>
<?php include 'includes/footer.php';?>
<?php
}else{
  header('Location:index.php');
}
?>