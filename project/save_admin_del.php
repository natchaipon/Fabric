<?php
include("configdatabase.php");

$id_del = $_GET["id_del"];

$sql = "DELETE FROM par_nan_data WHERE id = $id_del";

if ($objCon->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $objCon->error;
}

$objCon->close();

header("Location:admin_page_edit_narmal.php");
?>