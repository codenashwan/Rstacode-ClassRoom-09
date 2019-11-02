<?php include 'includes/nav.php';
if(isset($teacherid)){
?>
<div class="container mt-5">
<div class="container-fluid">
        <div class="header-body">
          <div class="row">
          <div class="col-xl-4 col-lg-6 mt-3">
              <div class="card card-stats bg-gradient-indigo border-0 mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-white mb-0">NOTIFICATION</h5>
                      <span class="h2 font-weight-bold mb-0 text-white">44</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-white text-white rounded-circle shadow">
                        <img src="../assets/img/notification.svg" width="20" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-lg-6 mt-3">
              <div class="card card-stats mb-4 border-0 mb-xl-0 ">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">STUDENTS</h5>
                      <?php
                      $query = mysqli_query($db  , "SELECT SUM(num_students) AS `sum` FROM class WHERE `teacher_id` = '$teacherid'");
                      while($row = mysqli_fetch_assoc($query)){?>
                        <span class="h2 font-weight-bold mb-0"><?php  echo $row['sum'];?></span>
                        <?php
                      }
                      ?>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <img src="../assets/img/students.svg" width="50" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <a href="class.php" class="col-xl-4 col-lg-6 mt-3 hover">
              <div class="card card-stats mb-4 border-0 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">CLASS</h5>
                      <?php 
                      $query = mysqli_query($db , "SELECT * FROM class WHERE `teacher_id` = '$teacherid'");
                      echo '<span class="h2 font-weight-bold mb-0">'.mysqli_num_rows($query).'</span>';
                      ?>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <img src="../assets/img/class.svg" width="50" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            <div class="col-xl-4 col-lg-6 mt-3">
              <div class="card card-stats mb-4 border-0 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">POSTS </h5>
                      <?php
                      $query = mysqli_query($db , "SELECT * FROM posts WHERE `teacher_id` = '$teacherid'");
                      echo '<span class="h2 font-weight-bold mb-0">'.mysqli_num_rows($query).'</span>';
                      ?>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <img src="../assets/img/post.svg" width="50" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php
}else{
  header("Location:index.php");
}
?>