<?php
    $id_edit = $_GET["id_edit"];
    include("configdatabase.php");
     $sql = "SELECT * FROM data_narmal WHERE id = $id_edit;";
     $result=mysqli_query($objCon,$sql);
     $data = array();
     while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
        for($i = 0; $i <= 1; $i++){
            $data[] = $row[$i];
        }
     }
?>

<?php include("nav_bar.php"); ?>

<div class="container">
<h3>แก้ไขข้อมูลพื้นฐาน</h3>
<form action="edit_update.php" method="post">
<div class="row">
    <div class="col-6 col-md-4">
        <label for="par_pet_par_tor">ประเภทผ้าทอ</label>
        <input type="hidden" name="update_id" value="<?php echo($id_edit); ?>">
        <input class="form-control" id="par_pet_par_tor" type="text" name="par_pet_par_tor" value="<?php echo($data[1]); ?>">
    </div>
</div>
<br>
<button type="submit" class="btn btn-primary">แก้ไข</button>&nbsp;&nbsp;&nbsp;&nbsp;
</form>
</div>
</body>
</html>


