<?php 
include("configdatabase.php");
$sql = "SELECT * FROM data_narmal";
$result=mysqli_query($objCon,$sql);
?>

<?php include("nav_bar.php"); ?>

<div class="container">
  <h2>ลบข้อมูลประเภทผ้าทอ</h2>
  <br>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>  

  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>ประเภทผ้าทอ</th>
        <th>ลบ</th>
        <th>แก้ไข</th>
      </tr>
    </thead>
  
<?php
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
?>

    <tbody id="myTable">
      <tr>
        <td><?php echo($row["id"]); ?></td>
        <td><?php echo($row["par_pet_par_tor"]); ?></td>
        <td><a href="save_narmal_del.php?id_del=<?php echo($row["id"]); ?>" class="btn btn-info" role="button">ลบ</a></td>
        <td><a href="edit_data_narmal.php?id_edit=<?php echo($row["id"]); ?>" class="btn btn-info" role="button">แก้ไข</a></td>
    </tbody>
    
<?php } ?>
</table>
</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</body>
</html>