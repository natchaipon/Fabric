<?php 
include("configdatabase.php");
$sql = "SELECT * FROM par_nan_data";
$result=mysqli_query($objCon,$sql);
?>

<?php include("nav_bar.php"); ?>

<div class="container">
  <h2>หน้าแรก</h2>
  <br>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>  

  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>หมู่บ้าน</th>
        <th>ตำบล</th>
        <th>อำเภอ</th>
        <th>จังหวัด</th>
      </tr>
    </thead>
  
    <thead>
      <tr>
        <th>ชื่อผ้าทอ</th>
        <th>รายละเอียดผ้าทอ</th>
        <th>ผู้ทอผ้า/ผู้ให้ข้อมูล</th>
        <th>ประเภทการทอ</th>
        <th>ชนิดผ้าทอ</th>
        <th>เบอร์ติดต่อ</th>
        <th>ราคา</th>
        <th>ความรู้สึก/อารมณ์บนลายผ้า</th>
      </tr>
    </thead>

<?php
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
?>

    <tbody id="myTable">
      <tr>
        <td><?php echo($row["id"]); ?></td>
        <td><?php echo($row["mu_ban"]); ?></td>
        <td><?php echo($row["district"]); ?></td>
        <td><?php echo($row["amphur"]); ?></td>
        <td><?php echo($row["province"]); ?></td>
    </tbody>



    <tbody id="myTable">
      <tr>
        <td><?php echo($row["name_par_tor"]); ?></td>
        <td><?php echo($row["des"]); ?></td>
        <td><?php echo($row["human"]); ?></td>
        <td><?php echo($row["par_pet_kan_tor"]); ?></td>
        <td><?php echo($row["cha_nit_par_tor"]); ?></td>
        <td><?php echo($row["miss_call"]); ?></td>
        <td><?php echo($row["price"]); ?></td>
        <td><?php echo($row["ar_rom"]); ?></td>
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