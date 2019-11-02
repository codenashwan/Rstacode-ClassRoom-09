<?php include 'includes/nav.php' ; 
if(isset($userid)){?>
<div class="container">
  <?php
if(isset($_GET['seen'])){
  $query =mysqli_query($db , "UPDATE answer_reports SET seen=1 WHERE userid=$userid");
}
if(isset($_GET['delete'])){
    $postid = mysqli_real_escape_string($db  ,$_GET['delete']);
    $query =mysqli_query($db , "UPDATE answer_reports SET is_deleted=1,seen=1 WHERE userid=$userid AND id = $postid ");
    
    if($query){
      header("Location:answer.php");
    }
}
$query = mysqli_query($db, "SELECT r.*,c.* FROM reports r  inner join answer_reports  c on r.userid = c.userid WHERE c.userid = $userid AND c.is_deleted = 0  AND r.id = c.report_id");
if(mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_assoc($query)){?>
  <div class="mt-3 bg-white p-3 shadow-sm text-center">
    <a href="?delete=<?php echo $row['id'];?>"><img src="assets/img/remove.svg"
        style="float:right;margin-top: 0px;margin-right:-5px;width:20px;"></a>
    <p class="font-weight-bolder">Your Reports : <?php echo $row['comment'];?></p>
    <p> Head Of Department : <?php echo $row['answer'];?></p>
  </div>
  <?php
}
}else{?>
  <div class="mt-3">
    <p class="text-center">NOTHING...</p>
  </div>
  <?php
}
?>
</div>
<?php include 'includes/footer.php';?>
<?php
}else{
  header('Location:index.php');
}
?>