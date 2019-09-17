<?php
    include("configdatabase.php");
    include("config_thailand.php");
?>

<?php include("nav_bar.php"); ?>

<div class="container">
<h3>บันทึกข้อมูลผ้า</h3>
<form action="save_admin_page.php" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-6 col-md-4">
        <label for="name_par_tor">ชื่อผ้าทอ</label>
        <input class="form-control" id="name_par_tor" type="text" name="name_par_tor">
    </div>

    <div class="col-6 col-md-4">
        <label for="par_pet_kan_tor">ประเภทผ้าทอ</label>
            <select name="par_pet_kan_tor" class="form-control">
                <option value="">-----ประเภทผ้าทอ-----</option>
                <?php
                        $sql = mysqli_query($objCon, "SELECT par_pet_par_tor From data_narmal");
                        $row = mysqli_num_rows($sql);
                        while ($row = mysqli_fetch_array($sql)){
                            echo "<option value='". $row['par_pet_par_tor'] ."'>" .$row['par_pet_par_tor'] ."</option>" ;
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
                            echo "<option value='". $row['cha_nit_par_tor'] ."'>" .$row['cha_nit_par_tor'] ."</option>" ;
                        }
                    ?>
            </select>
    </div>

    <div class="col-6 col-md-4">
        <div class="form-group">
        <label for="des">รายละเอียดผ้าทอ</label>
        <textarea class="form-control" rows="5" id="des" name="des"></textarea>
        </div>
    </div> 
</div>

<div class="row">
    <div class="col-6 col-md-4">
    <label for="human">ผู้ทอผ้า/ผู้ให้ข้อมูล</label>
        <input class="form-control" id="human" type="text" name="human">
    </div>
    </div>

<div class="row">
    <div class="col-6 col-md-4">
        <label for="ar_rom">ความรู้สึก/อารมณ์บนลายผ้า</label>
        <input class="form-control" id="ar_rom" type="text" name="ar_rom">
    </div>
    <div class="col-6 col-md-4">
        <label for="price">ราคา</label>
        <input class="form-control" id="price" type="text" name="price">
    </div>
    <div class="col-6 col-md-4">
        <label for="miss_call">เบอร์ติดต่อ</label>
        <input class="form-control" id="miss_call" type="text" name="miss_call">
    </div>
</div>

<br>

<div class="row">
    <div class="col-6 col-md-4">
        <label for="fileToUpload">อัพโหลดรูป 1</label>
        <input class="form-control" id="fileToUpload" type="file" name="fileToUpload" onchange="readURL1(this);">
        <br>
        <img id="im1" class="img-rounded">
    </div>
    </div>
<br>

<div class="row">
    <div class="col-6 col-md-4">
        <label for="fileToUpload2">อัพโหลดรูป 2</label>
        <input class="form-control" id="fileToUpload2" type="file" name="fileToUpload2" onchange="readURL2(this);">
        <br>
        <img id="im2" class="img-rounded">
    </div>
    </div>
<br>

<div class="row">
    <div class="col-6 col-md-4">
        <label for="fileToUpload3">อัพโหลดรูป 3</label>
        <input class="form-control" id="fileToUpload3" type="file" name="fileToUpload3" onchange="readURL3(this);">
        <br>
        <img id="im3" class="img-rounded">
    </div>
    </div>
<br>

<div class="row">
    <div class="col-6 col-md-4">
        <label for="fileToUpload4">อัพโหลดรูป 4</label>
        <input class="form-control" id="fileToUpload4" type="file" name="fileToUpload4" onchange="readURL4(this);">
        <br>
        <img id="im4" class="img-rounded">
    </div>
    </div>
<br>

<div class="row">
    <div class="col-6 col-md-4">
        <label for="fileToUpload5">อัพโหลดรูป 5</label>
        <input class="form-control" id="fileToUpload5" type="file" name="fileToUpload5" onchange="readURL5(this);">
        <br>
        <img id="im5" class="img-rounded">
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

    <div class="col-6 col-md-4">   
        <label for="amphur">อำเภอ</label> &nbsp;&nbsp; 
            <select name="amphur" class="form-control" id="amphur" onchange="showUser(this.value)">
            <option value=''>-----อำเภอ-----</option>
                <?php
                    include("config_thailand.php");
                    $sql = mysqli_query($objCon1, "SELECT * FROM amphur WHERE PROVINCE_ID = 43");
                    $row = mysqli_num_rows($sql);
                    while ($row = mysqli_fetch_array($sql)){
                            echo "<option value='{$row['AMPHUR_ID']}' >" .$row['AMPHUR_NAME'] . "</option>";
                    }
                    ?>
                    <option value=''>-----อำเภอ-----</option>
            </select>
    </div>


    <div class="col-6 col-md-4">
        <label for="district">ตำบล</label> &nbsp;&nbsp; 
        <select name="district" class="form-control" id="txtHint">
        <option value=''>-----ตำบล-----</option>
        </select>
    </div>

 
    <div class="col-6 col-md-4">
        <label for="mu_ban">หมู่บ้าน</label>
        <input class="form-control" id="mu_ban" type="text" name="mu_ban">
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
            xmlhttp = new XMLHttpRequest();
        } else {
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


<script type="text/javascript">
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#im1').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
            var yourImg = document.getElementById('im1');
            if(yourImg && yourImg.style) {
                yourImg.style.height = '100px';
                yourImg.style.width = '100px';
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
            var yourImg = document.getElementById('im2');
            if(yourImg && yourImg.style) {
                yourImg.style.height = '100px';
                yourImg.style.width = '100px';
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
            var yourImg = document.getElementById('im3');
            if(yourImg && yourImg.style) {
                yourImg.style.height = '100px';
                yourImg.style.width = '100px';
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
            var yourImg = document.getElementById('im4');
            if(yourImg && yourImg.style) {
                yourImg.style.height = '100px';
                yourImg.style.width = '100px';
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
            var yourImg = document.getElementById('im5');
            if(yourImg && yourImg.style) {
                yourImg.style.height = '100px';
                yourImg.style.width = '100px';
            }
        }

    </script>

</body>
</html>

