<?php
$update_id = $_POST["update_id"];
echo($update_id);

include("configdatabase.php");

function insert_data_form(){
    $par_pet_par_tor = $_POST['par_pet_par_tor'];

    return array("par_pet_par_tor" => $par_pet_par_tor );
}


$data = insert_data_form();

$sql = "UPDATE data_narmal SET par_pet_par_tor='".$data['par_pet_par_tor']."' WHERE id=$update_id";
                                

if ($objCon->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $objCon->error;
}

header("Location:data_normal.php");

?>