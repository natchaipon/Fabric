<?php 
include("configdatabase.php");
$sql = "SELECT * FROM par_nan_data";
$result=mysqli_query($objCon,$sql);
?>

<?php include("nav_bar.php"); ?>

<div class="container">
<h2>แก้ไขข้อมูลทั่วไป</h2>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>หมู่บ้าน</th>
        <th>ตำบล</th>
        <th>อำเภอ</th>
        <th>จังหวัด</th>
        <th>แก้ไข</th>
        <th>ลบ</th>
      </tr>
    </thead>

    <thead>
      <tr>
        <th>ชื่อผ้าทอ</th>
        <th>ประเภทการทอ</th>
        <th>ชนิดผ้าทอ</th>
        <th>รายละเอียดผ้าทอ</th>
        <th>เบอร์ติดต่อ</th>
        <th>ราคา</th>
        <th>ความรู้สึก/อารมณ์บนลายผ้า</th>
      </tr>
    </thead>

    <thead>
      <tr>
        <th>รูป</th>
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
        <td><a href="save_admin_edit_narmal.php?id_edit=<?php echo($row["id"]); ?>" class="btn btn-info" role="button">แก้ไข</a></td>
        <td><a href="save_admin_del.php?id_del=<?php echo($row["id"]); ?>" class="btn btn-info" role="button">ลบ</a></td>


        <tr>
        <td><?php echo($row["name_par_tor"]); ?></td>
        <td><?php echo($row["par_pet_kan_tor"]); ?></td>
        <td><?php echo($row["cha_nit_par_tor"]); ?></td>
        <td><?php echo($row["des"]); ?></td>
        <td><?php echo($row["miss_call"]); ?></td>
        <td><?php echo($row["price"]); ?></td>
        <td><?php echo($row["ar_rom"]); ?></td>
      </tr>


      <tr>
        <td><img src="<?php echo($row["part_img"]); ?>" class="img-thumbnail" width="100" height="100"></td>
        <?php for($i = 2; $i <= 5; $i++){ 
          $img = "part_img" . $i;
          if($row["$img"] != "uploads/"){ ?>
        <td><img src="<?php echo($row["$img"]); ?>" class="img-thumbnail" width="100" height="100"></td>
          <?php }else{
             
          }
        }    ?>
        </tr>


        </tr>
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
