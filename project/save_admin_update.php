<?php
$update_id = $_POST["update_id"];
echo($update_id);

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
    $img1 = $_POST['img1'];
    $img2 = $_POST['img2'];
    $img3 = $_POST['img3'];
    $img4 = $_POST['img4'];
    $img5 = $_POST['img5'];
    $dis1 = $_POST['dis1'];
    $dis2 = $_POST['dis2'];
    $dis3 = $_POST['dis3'];
    $des = $_POST['des'];

    echo($mu_ban . " " .$district . " " . $amphur . " " . $province);

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
                "img1" => $img1 ,
                "img2" => $img2 ,
                "img3" => $img3 ,
                "img4" => $img4 ,
                "img5" => $img5 ,
                "dis1" => $dis1 ,
                "dis2" => $dis2 ,
                "dis3" => $dis3 ,
                "des" => $des
                
            );
}


function upload_image_form($name_file){
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

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 1000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
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

$data = insert_data_form();
$str_re = array();
for($i = 1; $i <= 5; $i++){
    $name_file = "fileToUpload" . $i;
    $re = upload_image_form($name_file);
    $str_re[] = explode(" ",$re);
}

$i1 = implode(" ",$str_re[0]);
$i2 = implode(" ",$str_re[1]);
$i3 = implode(" ",$str_re[2]);
$i4 = implode(" ",$str_re[3]);
$i5 = implode(" ",$str_re[4]);

echo("<br>");
echo($data["mu_ban"]);
echo("<br>");

if($i1  == "uploads/" && $i2  == "uploads/" && $i3  == "uploads/"  && $i4  == "uploads/"  && $i5  == "uploads/" ){
    echo("111111111111111");
    $sql = "UPDATE par_nan_data SET 
                                
                                part_img='".$data['img1']."' ,
                                part_img2='".$data['img2']."' ,
                                part_img3='".$data['img3']."' ,
                                part_img4='".$data['img4']."' ,
                                part_img5='".$data['img5']."' ,
                                WHERE id=$update_id";
                                

if ($objCon->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $objCon->error;
}

}else{
    echo("2222222222222222222222222");
    if($i1  != "uploads/"){
        $sql = "UPDATE par_nan_data SET part_img='$i1' WHERE id=$update_id";
        if ($objCon->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        }else{      
            $sql = "UPDATE par_nan_data SET part_img='".$data['img1']."' WHERE id=$update_id";
            if ($objCon->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $objCon->error;
            }
        }



        if($i2  != "uploads/"){
            $sql = "UPDATE par_nan_data SET part_img2='$i2' WHERE id=$update_id";
            if ($objCon->query($sql) === TRUE) {
                echo "New record created successfully";
            } 
            }else{      
                $sql = "UPDATE par_nan_data SET part_img2='".$data['img2']."' WHERE id=$update_id";
                if ($objCon->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $objCon->error;
                }
            }

        
            if($i3  != "uploads/"){
                $sql = "UPDATE par_nan_data SET part_img3='$i3' WHERE id=$update_id";
                if ($objCon->query($sql) === TRUE) {
                    echo "New record created successfully";
                } 
                }else{      
                    $sql = "UPDATE par_nan_data SET part_img3='".$data['img3']."' WHERE id=$update_id";
                    if ($objCon->query($sql) === TRUE) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $objCon->error;
                    }
                }


                if($i4  != "uploads/"){
                    $sql = "UPDATE par_nan_data SET part_img4='$i4' WHERE id=$update_id";
                    if ($objCon->query($sql) === TRUE) {
                        echo "New record created successfully";
                    } 
                    }else{      
                        $sql = "UPDATE par_nan_data SET part_img4='".$data['img4']."' WHERE id=$update_id";
                        if ($objCon->query($sql) === TRUE) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql . "<br>" . $objCon->error;
                        }
                    }


                    if($i5  != "uploads/"){
                        $sql = "UPDATE par_nan_data SET part_img5='$i5' WHERE id=$update_id";
                        if ($objCon->query($sql) === TRUE) {
                            echo "New record created successfully";
                        } 
                        }else{      
                            $sql = "UPDATE par_nan_data SET part_img5='".$data['img5']."' WHERE id=$update_id";
                            if ($objCon->query($sql) === TRUE) {
                                echo "New record created successfully";
                            } else {
                                echo "Error: " . $sql . "<br>" . $objCon->error;
                            }
                        }

}


if($data["district"] == "" && $data["amphur"] == "" && $data["province"] == ""){
    //echo("111111111111111");
    $sql = "UPDATE par_nan_data SET 
                                district='".$data['dis3']."',
                                amphur='".$data['dis2']."',
                                province='".$data['dis1']."'
                                WHERE id=$update_id";

if ($objCon->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $objCon->error;
}

}else{
    //echo("222222222222222");
    $sql = "UPDATE par_nan_data SET 
                                district='".$data['district']."',
                                amphur='".$data['amphur']."',
                                province='".$data['province']."'
                                WHERE id=$update_id";

if ($objCon->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $objCon->error;
}
}




$sql = "UPDATE par_nan_data SET mu_ban='".$data['mu_ban']."' ,
                                name_par_tor='".$data['name_par_tor']."',
                                par_pet_kan_tor='".$data['par_pet_kan_tor']."',
                                cha_nit_par_tor='".$data['cha_nit_par_tor']."',
                                miss_call='".$data['miss_call']."',
                                price='".$data['price']."',
                                ar_rom='".$data['ar_rom']."',
                                des='".$data['des']."'
                                WHERE id=$update_id";
                                

if ($objCon->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $objCon->error;
}

header("Location:admin_page_edit_narmal.php");

?>