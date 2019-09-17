<?php
include("configdatabase.php");

function insert_data_form(){
    $mu_ban = $_POST['mu_ban'];
    $district = $_POST['district'];
    $amphur = $_POST['amphur'];
    $province = $_POST['province'];
    $name_par_tor = $_POST['name_par_tor'];
    $par_pet_kan_tor = $_POST['par_pet_kan_tor'];
    $cha_nit_par_tor = $_POST['cha_nit_par_tor'];
    $miss_call = $_POST['miss_call'];
    $price = $_POST['price'];
    $ar_rom = $_POST['ar_rom'];
    $des = $_POST['des'];
    $human = $_POST['human'];

    include("config_thailand.php");

    $a = "";
    $sql = mysqli_query($objCon1, "SELECT AMPHUR_NAME From amphur WHERE AMPHUR_ID = $amphur");
                        $row = mysqli_num_rows($sql);
                        while ($row = mysqli_fetch_array($sql)){
                            $a = $row['AMPHUR_NAME'];
                        }

    $d = "";
    $sql = mysqli_query($objCon1, "SELECT DISTRICT_NAME From district WHERE DISTRICT_ID = $district");
                        $row = mysqli_num_rows($sql);
                        while ($row = mysqli_fetch_array($sql)){
                            $d = $row['DISTRICT_NAME'];
                        }

    //echo($mu_ban . " " .$district . " " . $amphur . " " . $province);


    return array("mu_ban" => $mu_ban , 
                "district" => $d ,
                "amphur" => $a ,
                "province" => $province ,
                "name_par_tor" => $name_par_tor ,
                "par_pet_kan_tor" => $par_pet_kan_tor ,
                "cha_nit_par_tor" => $cha_nit_par_tor ,
                "miss_call" => $miss_call ,
                "price" => $price ,
                "ar_rom" => $ar_rom ,
                "des" => $des ,
                "human" => $human 
            );
}


function upload_image_form(){
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }


    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";

    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    return($target_file);
}



function upload_image_form1($name_file){
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["$name_file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["$name_file"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }


    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";

    } else {
        if (move_uploaded_file($_FILES["$name_file"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["$name_file"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    return($target_file);
}

$str_re = array();
for($i = 2; $i <= 5; $i++){
    $name_file = "fileToUpload".$i;
    $re = upload_image_form1($name_file);
    $str_re[] = explode(" ",$re);
}

$i2 = implode(" ",$str_re[0]);
$i3 = implode(" ",$str_re[1]);
$i4 = implode(" ",$str_re[2]);
$i5 = implode(" ",$str_re[3]);
echo("----------".$i2." ".$i3." ".$i4." ".$i5."--------------------");

$data = insert_data_form();
$part_img = upload_image_form();
/*
echo("<br>");
echo($data["mu_ban"]);
echo("<br>");
echo($part_img);
*/

$sql = "INSERT INTO par_nan_data (mu_ban ,
                                  district ,
                                  amphur ,
                                  province ,
                                  name_par_tor ,
                                  par_pet_kan_tor ,
                                  cha_nit_par_tor ,
                                  miss_call	 ,
                                  price ,
                                  ar_rom ,
                                  des ,
                                  human ,
                                  part_img ,
                                  part_img2 ,
                                  part_img3 ,
                                  part_img4 ,
                                  part_img5 )

VALUES ('".$data['mu_ban']."' ,
        '".$data['district']."' ,
        '".$data['amphur']."' ,
        '".$data['province']."' ,
        '".$data['name_par_tor']."' ,
        '".$data['par_pet_kan_tor']."' ,
        '".$data['cha_nit_par_tor']."' ,
        '".$data['miss_call']."' ,
        '".$data['price']."' ,
        '".$data['ar_rom']."' ,
        '".$data['des']."' ,
        '".$data['human']."' ,
        '$part_img' ,
        '$i2' ,
        '$i3' ,
        '$i4' ,
        '$i5' )";



if ($objCon->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $objCon->error;
}

header("Location:admin_page_insert.php");

?>