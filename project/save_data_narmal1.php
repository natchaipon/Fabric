<?php
include("configdatabase.php");

function insert_data_form(){
    $cha_nit_par_tor = $_POST['cha_nit_par_tor'];
    return array("cha_nit_par_tor" => $cha_nit_par_tor);
}

$data = insert_data_form();
$sql = "INSERT INTO data_narmala (cha_nit_par_tor) VALUES ('".$data['cha_nit_par_tor']."')";

if ($objCon->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $objCon->error;
}

header("Location:data_normal.php");

?>