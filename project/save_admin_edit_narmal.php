<?php
    include("configdatabase.php");
    $id_edit = $_GET["id_edit"];
     include("configdatabase.php");
     $sql = "SELECT * FROM par_nan_data WHERE id = $id_edit;";
     $result=mysqli_query($objCon,$sql);
     $data = array();
     while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
        for($i = 0; $i <= 17; $i++){
            $data[] = $row[$i];
        }
     }
    include("config_thailand.php");
?>

<?php include("nav_bar.php"); ?>


<div class="container">
<h3>บันทึกข้อมูลผ้า</h3>
<form action="save_admin_update.php" method="post" enctype="multipart/form-data" runat="server">
<div class="row">
    <div class="col-6 col-md-4">
        <input  type="hidden" name="update_id" value="<?php echo($data[0]); ?>">
        <label for="name_par_tor">ชื่อผ้าทอ</label>
        <input class="form-control" id="name_par_tor" type="text" name="name_par_tor" value="<?php echo($data[5]); ?>">
    </div>

    <div class="col-6 col-md-4">
        <label for="par_pet_kan_tor">ประเภทผ้าทอ</label>
            <select name="par_pet_kan_tor" class="form-control">
                <option value="">-----ประเภทผ้าทอ-----</option>
                <?php
                        $sql = mysqli_query($objCon, "SELECT par_pet_par_tor From data_narmal");
                        $row = mysqli_num_rows($sql);
                            while ($row = mysqli_fetch_array($sql)){
                                if($data[6] !=  $row['par_pet_par_tor']){
                                    echo "<option value='". $row['par_pet_par_tor'] ."'>" .$row['par_pet_par_tor'] ."</option>" ;
                                }else{
                                    echo "<option value='{$data[6]}' selected >$data[6]</option>";
                                
                            }
                        }
                    ?>
            </select>
    </div> 

       <div class="col-6 col-md-4">
        <label for="cha_nit_par_tor">ชนิดผ้าทอ</label>
            <select name="cha_nit_par_tor" class="form-control">
                <option value="">-----ชนิดผ้าทอ-----</option>
                <?php
                        $sql = mysqli_query($objCon, "SELECT cha_nit_par_tor From data_narmala");
                        $row = mysqli_num_rows($sql);
                        while ($row = mysqli_fetch_array($sql)){
                            if($data[7] !=  $row['cha_nit_par_tor']){
                                echo "<option value='". $row['cha_nit_par_tor'] ."'>" .$row['cha_nit_par_tor'] ."</option>" ;
                            }else{
                                echo "<option value='{$data[7]}' selected >$data[7]</option>";
                        }
                    }
                    ?>
            </select>
    </div>

    <div class="col-6 col-md-4">
        <div class="form-group">
        <label for="des">รายละเอียดผ้าทอ</label>
        <textarea class="form-control" rows="5" id="des" name="des" ><?php echo($data[11]); ?></textarea>
        </div>
    </div> 
</div>

<div class="row">
    <div class="col-6 col-md-4">
    <label for="human">ผู้ทอผ้า/ผู้ให้ข้อมูล</label>
        <input class="form-control" id="human" type="text" name="human" value="<?php echo($data[12]); ?>">
    </div>
    </div>

<div class="row">
    <div class="col-6 col-md-4">
        <label for="ar_rom">ความรู้สึก/อารมณ์บนลายผ้า</label>
        <input class="form-control" id="ar_rom" type="text" name="ar_rom" value="<?php echo($data[10]); ?>">
    </div>
    <div class="col-6 col-md-4">
        <label for="price">ราคา</label>
        <input class="form-control" id="price" type="text" name="price" value="<?php echo($data[9]); ?>">
    </div>
    <div class="col-6 col-md-4">
        <label for="miss_call">เบอร์ติดต่อ</label>
        <input class="form-control" id="miss_call" type="text" name="miss_call" value="<?php echo($data[8]); ?>">
    </div>
</div>


<div class="row">
    <div class="col-6 col-md-4">
        <label for="fileToUpload1">อัพโหลดรูป 1</label>
        <input  id="fileToUpload1" type="file" name="fileToUpload1" onchange="CopyMe(this, 'img1') , readURL1(this);">
        <br>
        <input  id="img1" type="text" name="img1" value="<?php echo($data[13]); ?>" readonly="readonly" class="form-control">
        <br>
        <?php if($data[13] != "uploads/"){ ?>
        <img src="<?php echo($data[13]); ?>" class="img-thumbnail" width="100" height="100" id="im1">
       <?php }else{

        } ?>
    </div>
    </div>
<br>

<div class="row">
    <div class="col-6 col-md-4">
        <label for="fileToUpload2">อัพโหลดรูป 2</label>
        <input id="fileToUpload2" type="file" name="fileToUpload2" onchange="CopyMe(this, 'img2') , readURL2(this);">
        <br>
        <input  id="img2" type="text" name="img2" value="<?php echo($data[14]); ?>" readonly="readonly" class="form-control">
        <br>
       <?php if($data[14] != "uploads/"){ ?>
        <img src="<?php echo($data[14]); ?>" class="img-thumbnail" width="100" height="100" id="im2">
       <?php }else{

        } ?>
    </div>
    </div>
<br>

<div class="row">
    <div class="col-6 col-md-4">
        <label for="fileToUpload3">อัพโหลดรูป 3</label>
        <input id="fileToUpload3" type="file" name="fileToUpload3" onchange="CopyMe(this, 'img3') , readURL3(this);">
        <br>
        <input  id="img3" type="text" name="img3" value="<?php echo($data[15]); ?>" readonly="readonly" class="form-control">
        <br>
        <?php if($data[15] != "uploads/"){ ?>
        <img src="<?php echo($data[15]); ?>" class="img-thumbnail" width="100" height="100" id="im3">
       <?php }else{

        } ?>
    </div>
    </div>
<br>

<div class="row">
    <div class="col-6 col-md-4">
        <label for="fileToUpload4">อัพโหลดรูป 4</label>
        <input id="fileToUpload4" type="file" name="fileToUpload4" onchange="CopyMe(this, 'img4') , readURL4(this);">
        <br>
        <input  id="img4" type="text" name="img4" value="<?php echo($data[16]); ?>" readonly="readonly" class="form-control">
        <br>
        <?php if($data[16] != "uploads/"){ ?>
        <img src="<?php echo($data[16]); ?>" class="img-thumbnail" width="100" height="100" id="im4">
       <?php }else{

        } ?>
    </div>
    </div>
<br>

<div class="row">
    <div class="col-6 col-md-4">
        <label for="fileToUpload5">อัพโหลดรูป 5</label>
        <input id="fileToUpload5" type="file" name="fileToUpload5" onchange="CopyMe(this, 'img5') , readURL5(this);">
        <br>
        <input  id="img5" type="text" name="img5" value="<?php echo($data[17]); ?>" readonly="readonly" class="form-control">
        <br>
        <?php if($data[17] != "uploads/"){ ?>
        <img src="<?php echo($data[17]); ?>" class="img-thumbnail" width="100" height="100" id="im5"> 
       <?php }else{

        } ?>
    </div>
    </div>
<br>


<h3>แหล่งทอ</h3>
<br>
<br>
<div class="row">
    <div class="col-6 col-md-4">
        <label for="province">จังหวัด</label> &nbsp;&nbsp; 
        <input type="text" name="province" value="<?php echo("น่าน"); ?>" id="province" class="form-control">
    </div>

<?php //echo("------------" . $data[3] . "------------"); ?>

    <div class="col-6 col-md-4">   
        <label for="amphur">อำเภอ</label> &nbsp;&nbsp; 
            <select name="amphur" class="form-control" id="amphur" onchange="showUser(this.value)">
                <option value="">-----อำเภอ-----</option>
                <?php
                
                    //echo "<option value='{$data[3]}' selected >$data[3]</option>";

        
                    include("config_thailand.php");
                    $sql = mysqli_query($objCon1, "SELECT * FROM amphur WHERE PROVINCE_ID = 43");
                    $row = mysqli_num_rows($sql);
                    $check_amphur_id = "";
                    while ($row = mysqli_fetch_array($sql)){
                        //echo($row['AMPHUR_NAME']);
                        if(trim($data[3]) !=  trim($row['AMPHUR_NAME'])){
                            echo "<option value='". $row['AMPHUR_ID'] ."'>" .$row['AMPHUR_NAME'] ."</option>" ;
                        }else{
                            echo "<option value='{$row['AMPHUR_ID']}' selected >" .$row['AMPHUR_NAME'] . "</option>";
                            $check_amphur_id = $row['AMPHUR_ID'];
                    }
                    
                }
                    ?>
            </select>
    </div>

<?php //echo("////////////" . $check_amphur_id); ?>

    <div class="col-6 col-md-4">
        <label for="district">ตำบล</label> &nbsp;&nbsp; 
        <select name="district" class="form-control" id="txtHint">
        <?php       
                    include("config_thailand.php");
                    $sql = mysqli_query($objCon1, "SELECT * FROM district WHERE AMPHUR_ID = $check_amphur_id");
                    $row = mysqli_num_rows($sql);
                    while ($row = mysqli_fetch_array($sql)){
                        if(trim($data[2]) !=  trim($row['DISTRICT_NAME'])){
                            echo "<option value='". $row['DISTRICT_ID'] ."'>" .$row['DISTRICT_NAME'] ."</option>" ;
                        }else{
                            echo "<option value='{$row['DISTRICT_ID']}' selected >" .$row['DISTRICT_NAME'] . "</option>";
                    }
                }
                    ?>
        </select>
    </div>

 
    <div class="col-6 col-md-4">
        <label for="mu_ban">หมู่บ้าน</label>
        <input class="form-control" id="mu_ban" type="text" name="mu_ban" value="<?php echo($data[1]); ?>">
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        <br>
        <br>
        <br>
    </div>

</form>
</div>

<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","amphur.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>



<script>
function CopyMe(oFileInput, sTargetID) {
    document.getElementById(sTargetID).value = oFileInput.value;
}
</script>


<script type="text/javascript">
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#im1').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#im2').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#im3').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#im4').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL5(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#im5').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

</body>
</html>










<!-- 0902469707 -->