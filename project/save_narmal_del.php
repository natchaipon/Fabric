<?php
include("configdatabase.php");

$id_del = $_GET["id_del"];

$sql = "DELETE FROM data_narmal WHERE id = $id_del";

if ($objCon->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $objCon->error;
}

$objCon->close();

header("Location:edit_narmal.php");
?>