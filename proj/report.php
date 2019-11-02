<?php include 'includes/nav.php' ; 
if(isset($userid)){?>
<div class="container">
  <?php
$alert = ['result' => ''];
if(isset($_POST['submit'])){
$comment = mysqli_real_escape_string($db, $_POST['comment']);
$comment = htmlspecialchars($comment);
if(empty($comment)){
  $alert['result'] = "تکایە ڕونکردنەوە بدە";
}else
if(strlen($comment) < 10){
  $alert['result'] = "تکایە ڕونکردنەوەی زیاتر بدە";
}else{
  $query = mysqli_query($db , "INSERT INTO reports (`userid` , `comment`) VALUES ('$userid' , '$comment')");
  if($query){
    $alert['result'] = "<p  class='h3 text-dark'>سوپاس بۆ ڕونکردنەوەکەت بە زوترین کات جوابت ئەدەینەوە</p>";
  }
}
}
?>
  <div class=" mt-5 p-3 text-center">
    <p class="w3-container h3 text-dark text-left">What is Your Problem ?</p>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <textarea name="comment" class="w-100 shadow-sm  border-0 p-3" rows="10" placeholder="Your Problem ?"></textarea>
      <span class="text-danger text-center h3"><?php echo $alert['result'];?></span> <br>
      <button name="submit" class="btn bg-gradient-primary border-0 col-4 mt-3 shadow-sm text-white">SEND</button>
    </form>
  </div>
</div>
<?php include 'includes/footer.php';?>
<?php
}else{
    header("Location:index.php");
}
?>