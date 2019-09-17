<?php
$update_id = $_POST["update_id"];
echo($update_id);

include("configdatabase.php");

function insert_data_form(){
    $cha_nit_par_tor = $_POST['cha_nit_par_tor'];

    return array("cha_nit_par_tor" => $cha_nit_par_tor );
}


$data = insert_data_form();



$sql = "UPDATE data_narmala SET cha_nit_par_tor='".$data['cha_nit_par_tor']."' WHERE id=$update_id";
                                

if ($objCon->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $objCon->error;
}

header("Location:data_normal.php");

?>