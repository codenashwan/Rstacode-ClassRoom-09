<?php include 'includes/config.php' ; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Basic Education</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/navbar.css">
  <link rel="stylesheet" href="assets/css/OswaldFont.css" >
  <link rel="stylesheet" href="assets/css/Speda.ttf">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">  
</head>

<body>
  <div class=" w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none;right:0" id="rightMenu">
    <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
    <?php if(isset($userid)){?>
    <div class="d-flex justify-content-center m-3">
      <a href="profile.php"><img class="radius-20" style="max-width: 15rem;height:50px;margin:50 auto"
          src="upload/users/profileimg/profile.svg"> <span class="text-dark">
          <?php
  $query = mysqli_query($db , "SELECT * FROM students WHERE `id` = '$userid'");
  while($row = mysqli_fetch_assoc($query)){
    echo $row['username'];
  }
  ?>
        </span> </a>
    </div>
    <?php } else{?>
    <a href="index.php" class="text-decoration-none">
      <div class="p-2 text-center  bg-gradient-primary mt-3 shadow-sm text-white">LOGIN</div>
    </a>
    <?php } ?>
    <a href="index.php" class="w3-bar-item btn btn-outline-dark m-1">HOME</a>
    <?php if(isset($userid)){  ?>
    <a href="profile.php" class="w3-bar-item btn btn-outline-dark m-1">PROFILE</a>
    <a href="report.php" class="w3-bar-item btn btn-outline-dark m-1">SEND REPORT</a>
    <a href="answer.php" class="w3-bar-item btn btn-outline-dark m-1">ANSWER REPORT</a>
    <?php } ?>
    <a href="contact.php" class="w3-bar-item btn btn-outline-dark m-1">CONTACT</a>
    <a href="about.php" class="w3-bar-item btn btn-outline-dark m-1">ABOUT</a>
    <?php if(isset($userid)){  ?>
    <a href="?logout" class="w3-bar-item btn btn-outline-danger m-1">LOGOUT</a>
    <?php } ?>
    <?php include 'includes/footer.php' ; ?>
  </div>
  <div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none;right:0;" id="rightMenu">
    <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
  </div>
  <button class="w3-button w3-xlarge w3-right  m-3 hum" onclick="openRightMenu()">&#9776;</button>
  <div class="container w3-container">
    <a href="index.php" class="m-1 h1 font-weight-bolder text-white">Online Class | Basic Education</a>
  </div>
  <script>
    function openRightMenu() {
      document.getElementById("rightMenu").style.display = "block";
    }

    function closeRightMenu() {
      document.getElementById("rightMenu").style.display = "none";
    }
  </script>
  <?php
if(isset($_GET['logout'])){
  session_unset();
  unset($userid);
  unset($stage);
  session_destroy();
  header('Location:index.php');
  }
?>
  <?php if(isset($userid)){  ?>
  <!-- Modal Join -->
  <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default"
    aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
      <div class="modal-content">

        <div class="modal-header bg-gradient-primary border-0">
          <h4 class="modal-title text-white">Join Class</h5>
        </div>

        <div class="modal-body">
          <form action="joinproccess.php" method="post">
            <input type="text" name="code" class="form-control border-0 shadow-lg p-2" placeholder="Code">
            <button name="submit" class="btn bg-gradient-primary border-0 w-100 mt-2 p-2 text-white">Join</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Notification -->
  <div class="col-md-4">
    <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification"
      aria-hidden="true">
      <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header bg-gradient-primary border-0">
            <h6 class="modal-title" id="modal-title-default">Notification <img src="assets/img/notification.svg"
                class="mb-1" width="20"></h6>
          </div>
          <div class="modal-body bg-white">
            <div class="py-3 text-center">

              <?php
                $query = mysqli_query($db , "SELECT * FROM  answer_reports WHERE `userid`  = '$userid' AND `is_deleted` = 0 AND `seen` = 0");
                if(mysqli_num_rows($query) > 0){ 
  ?>
              <div class="d-flex justify-content-center  text-dark shadow-sm mb-1" style="background-color:#f2f2f2">
                <img class="rounded-circle mt-2" src="assets/img/university.svg" width="40" height="40">
                <a href="answer.php?seen" class=" ml-2">Answer From University <p class="text-left" style="color:#888">
                    2d</p></a>
              </div>
              <?php
}else{
  echo "<p class='text-center text-dark'>NOTHING..</p>";
}
?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-3">
    <ul class="nav nav-pills nav-pills-circle" id="tabs_2" role="tablist">
      <li class="nav-item">
        <a class="nav-link bg-white rounded-circle active" data-toggle="modal" data-target="#modal-notification">
          <img src="assets/img/notification.svg" class="mb-2" width="40"><img>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link bg-white rounded-circle active" data-toggle="modal" data-target="#modal-default">
          <img src="assets/img/add.svg" class="mb-1" width="40"><img>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link bg-white rounded-circle active" href="absences.php">
          <img src="assets/img/absences.svg" class="mb-1" width="40"><img>
        </a>
      </li>
    </ul>
  </div>
  <?php } ?>