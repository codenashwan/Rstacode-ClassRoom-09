<?php include 'config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Teacher System</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/navbar.css">
  <link rel="stylesheet" href="../assets/css/OswaldFont.css" >
  <link rel="stylesheet" href="../assets/css/Speda.ttf">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">  
</head>
<body>

<?php if(isset($teacherid)){
if(isset($_GET['logout'])){
  session_unset();
  unset($userid);
  unset($stage);
  session_destroy();
  header('Location:index.php');
  }
?>
<div class="container">
    <div class="row bg-white text-center mt-5 p-2">
    <div class="col">
    <a href="home.php">
      <?php
      $query = mysqli_query($db , "SELECT * FROM teachers WHERE `id`  = '$teacherid' ");
      while($row = mysqli_fetch_assoc($query)){?>
      <span><img src="../upload\teachers\profile_images/<?php echo $row['profile_img'];?>" class="rounded-circle mr-3" width="40"> Welcome, <?php echo $row['name'];?></span>
<?php
      }
      ?>
      </a>
    </div>
    <div class="col">
      <span><a href="?logout" class="btn btn-danger">LOGOUT</a></span>
    </div>
  </div>
</div>
<?php
}
?>