<?php include 'includes/nav.php';?>
<?php
if(isset($_GET['class_id']) && isset($_GET['stage'])){
$classid = mysqli_real_escape_string($db , $_GET['class_id']);
$stage = mysqli_real_escape_string($db , $_GET['stage']);

$CheckSecurity = mysqli_query($db , "SELECT * FROM absences WHERE `teacher_id` = '$teacherid' AND `class_id` = '$classid'");
    while($row = mysqli_fetch_assoc($CheckSecurity)){
        $teacher_id = $row['teacher_id'];
        $class_id = $row['class_id']; 
    }
    if($teacher_id !== $teacherid && $classid !== $class_id){
        header("Location:class.php");
        exit();
    }else{?>

<div class="container mt-5">

<?php
if(isset($_POST['submit'])){
$classtype =  mysqli_real_escape_string($db , $_POST['classtype']);
if(empty($classtype)){
    header("Location:class.php");
}else{?>
<div class="row no-gutters bg-white radius-20 shadow-lg position-relative p-2">
  <div class="col-md-6 mb-md-0 p-md-4">
  <table class="table  table-white radius-20 shadow-lg">
  <thead>
    <tr class="text-center">
      <th scope="col">ناوی سیانی</th>
      <th scope="col">هاتووە</th>
      <th scope="col">نەهاتووە</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $query = mysqli_query($db , "SELECT * FROM students WHERE `stage` = '$stage' AND `class` = '$classtype'");
    while($row = mysqli_fetch_assoc($query)){?>
   <tr class="text-center">
      <td><?php echo $row['fullname'];?></td>
      <td><a href="" class="fa fa-check fa-2x text-success"></a></td>
      <td><a href="" class="fa fa-times fa-2x text-danger"></a></td>
    </tr>
    <?php    
    }
}
    
?>
 
  </tbody>
</table>
  </div>
  <div class="col-md-6 position-static p-4 pl-md-0">
  <table class="table table-white radius-20 shadow-lg">
  <thead>
    <tr class="text-center"> 
    <th scope="col">ناوی سیانی</th>
      <th scope="col">پاشگەز بوونەوە</th>
    </tr>
  </thead>
  <tbody>
  <tr class="text-center bg-danger text-white">
      <td>نەشوان عبدللە محمد</td>
      <td><a href="" class="fa fa-check"></a></td>
    </tr>
    <tr class="text-center bg-success text-white">
      <td>نەشوان عبدللە محمد</td>
      <td><a href="" class="fa fa-times"></a></td>
    </tr>
  </tbody>
</table>
  </div>
</div>
<?php
}else{
?>
<h2 class="text-white">  SELECT YOUR CLASS</h2>
<form action="absences.php?class_id=<?php echo $classid;?>&stage=<?php echo $stage;?>" method="post" class="row m-3">
<select name="classtype" class="col-sm form-control border-0 m-2 rounded-0 shadow-lg">
<option value="A">A</option>
<option value="B">B</option>
<option value="B">C</option>
</select>
<button name="submit" class="m-2 btn btn-white">Get Names</button>
</form>
<?php
}
?>
</div>

      <?php
    }
}else{
    header("Location:class.php");
}
?>