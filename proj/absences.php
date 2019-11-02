<?php include 'includes/nav.php' ; 
if(isset($userid)){
?>
<div class="container mt-5">
  <div class="row">
    <div class="col-sm mt-5">
      <div class="progress-wrapper">
        <div class="progress-info">
          <div class="progress-label">
            <span class="text-dark bg-white">نزیک بوونەوە لە دەرکردن</span>
          </div>
          <?php
    $query = mysqli_query($db , "SELECT * FROM sum_absences WHERE `userid` = '$userid'");
    while($row = mysqli_fetch_assoc($query)){
    $sum = $row['sum'];
    }
    ?>
          <div class="progress-percentage">
            <span class="text-white"><?php echo $sum;?>%</span>
          </div>
        </div>
        <div class="progress">
          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="<?php echo $sum;?>" aria-valuemin="0"
            aria-valuemax="100" style="width: <?php echo $sum;?>%;"></div>
        </div>
      </div>
    </div>
    <div class="col-sm mt-5">
      <div class="d-flex justify-content-center bg-gradient-primary p-3  shadow-lg radius-10">
        <select name="birth_month" class="form-control col-lg-4 col-sm mr-2 border-0 rounded-0">
          <?php for( $m=1; $m<=12; ++$m ) { 
          $month_label = date('F', mktime(0, 0, 0, $m, 1));
        ?>
          <option value="<?php echo $month_label; ?>"><?php echo $month_label; ?></option>
          <?php } ?>
        </select>
        <select name="birth_day" class="form-control col-lg-4 col-sm mr-2 border-0 rounded-0">
          <?php 
          $start_date = 1;
          $end_date   = 31;
          for( $j=$start_date; $j<=$end_date; $j++ ) {
            echo '<option value='.$j.'>'.$j.'</option>';
          }
        ?>
        </select>
        <button class="btn btn-dark border-0 rounded-0">SEARCH</button>
      </div>
      <span class="w3-container text-primary">Every Week Renew !</span>
      <table class="table table-white shadow-sm">
        <thead>
          <tr class="text-center">
            <th scope="col">Subject</th>
            <th scope="col">Date</th>
            <th scope="col">Scheduled Clock in</th>
            <th scope="col">Scheduled Clock out</th>
          </tr>
        </thead>
        <tbody>
          <?php
    $query = mysqli_query($db , "SELECT * FROM absences WHERE `userid` = '$userid'");
    while($row = mysqli_fetch_assoc($query)){?>
          <tr
            class="border alert text-center <?php if($row['ready'] ==0){echo "alert-danger";}else{echo "alert-success";}?>">
            <td><?php echo $row['subject'];?></td>
            <td><?php echo $row['date'];?></td>
            <td><?php echo $row['scheduled_in'];?></td>
            <td><?php echo $row['scheduled_out'];?></td>
          </tr>
          <?php
    }
    ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include 'includes/footer.php';?>

<?php
}else{
  header('Location:index.php');
}
?>