<?php
    include("config_thailand.php");
?>

<?php include("nav_bar.php"); ?>

<div class="container">
<h3>กรอกข้อมูลพื้นฐาน</h3>
<form action="save_data_narmal.php" method="post">
<div class="row">
    <div class="col-6 col-md-4">
        <label for="par_pet_par_tor">ประเภทผ้าทอ</label>
        <input class="form-control" id="par_pet_par_tor" type="text" name="par_pet_par_tor">
    </div>
</div>
<br>
<button type="submit" class="btn btn-primary">เพิ่ม</button>&nbsp;&nbsp;&nbsp;&nbsp;
<td><a href="edit_narmal.php" class="btn btn-info" role="button">แสดง/ลบ/แก้ไข</a></td>
</form>

<br>
<br>

<form action="save_data_narmal1.php" method="post">
<div class="row">
    <div class="col-6 col-md-4">
        <label for="cha_nit_par_tor">ชนิดผ้าทอ</label>
        <input class="form-control" id="cha_nit_par_tor" type="text" name="cha_nit_par_tor">
    </div>
</div>
<br>
<button type="submit" class="btn btn-primary">เพิ่ม</button>&nbsp;&nbsp;&nbsp;&nbsp;
<td><a href="edit_narmal1.php" class="btn btn-info" role="button">แสดง/ลบ/แก้ไข</a></td>
</form>

</div>
</body>
</html>

