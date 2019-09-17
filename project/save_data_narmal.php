<?php
include("configdatabase.php");

function insert_data_form(){
    $par_pet_par_tor = $_POST['par_pet_par_tor'];
    return array("par_pet_par_tor" => $par_pet_par_tor);
}

$data = insert_data_form();
$sql = "INSERT INTO data_narmal (par_pet_par_tor) VALUES ('".$data['par_pet_par_tor']."')";

if ($objCon->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $objCon->error;
}

header("Location:data_normal.php");

?>