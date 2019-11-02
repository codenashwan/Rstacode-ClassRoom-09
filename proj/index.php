<?php include 'includes/nav.php' ; ?>
<?php
if(isset($userid)){
  header("Location:home.php");
}else{
$errors = ['result' => ''];
if(isset($_POST['submit'])){
  $email = mysqli_real_escape_string($db , $_POST['email']);
  $email = htmlspecialchars($email);
  $password = mysqli_real_escape_string($db , $_POST['password']);
  $password = htmlspecialchars($password);
  if(empty($password) && empty($email)){
    $errors['result'] = "Fields is Empty";
  } else
  if(empty($email)){
    $errors['result'] = "Email is Empty";
  }else
  if(empty($password)){
    $errors['result'] = "Password is Empty";
  }else
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['result'] = "Invalid Email Format";
  }
  if(!array_filter($errors)){
  $password  = hash('gost', $password); 
  $query = mysqli_query($db , "SELECT * FROM students WHERE `email` = '$email' AND `password` = '$password'");
    if(mysqli_num_rows($query) > 0){
      while($row = mysqli_fetch_assoc($query)){
        $_SESSION['userid'] = $row['id'];
        $_SESSION['stage'] = $row['stage'];
      }
      header("Location:home.php");
    }else{
      $errors['result'] = "Something Went Worng !";
    }
  }
}
}
?>
<div class="container mt-5">
  <form class="col-lg-6 col-sm shadow-sm bg-white p-4 text-center " method="POST"
    action="<?php echo $_SERVER['PHP_SELF'];?>" style="margin:0 auto ">
    <div class="form-group">
      <input type="email" name="email" class="form-control border-0 p-4 w-100 shadow-sm mb-3" placeholder="Email">
    </div>
    <div class="form-group">
      <input type="password" name="password" class="form-control border-0 p-4 w-100 shadow-sm mb-3"
        placeholder="Password">
    </div>
    <div class="mb-3">
      <span class="text-danger text-center"><?php echo $errors['result'];?></span>
    </div>
    <button type="submit" name="submit" class="btn bg-gradient-primary border-0 w-100 p-2 text-white">LOGIN</button>
  </form>
</div>

<?php include 'includes/footer.php';?>