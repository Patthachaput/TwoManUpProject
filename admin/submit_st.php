<?php
  include('../server.php');
  $all_user = array();
  $users = array();

  $user_id = $_POST['studentID'];
  $sql = "SELECT * FROM users WHERE user_id = $user_id";

  $result = $conn->query($sql);

  if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        array_push($users,$row);
    }
  }

?>
<table class="table">
  <?php foreach ($users as $key => $value) { ?>
  <tr>
    <td><h5>Student ID:</h5></td>
    <td><?php echo $value['user_id']; ?></td>
    <td><h5>Student Name:</h5></td>
    <td><?php echo $value['f_name']; echo " "; echo $value['l_name']; ?></td>
    <td>
      <div class="form-check">
        <center><input type="checkbox" class="btn-check" id="btn-check-2-outlined" name="book2" value="2"checked autocomplete="off">
        <label class="btn btn-outline-secondary" for="btn-check-2-outlined">Checked</label></center>
      </div>
    </td>
  </tr>
<?php } ?>

</table>
