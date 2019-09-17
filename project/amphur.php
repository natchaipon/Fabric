
<?php
$q = intval($_GET['q']);

include("config_thailand.php");

mysqli_select_db($objCon1,"ajax_demo");
$sql="SELECT * From district WHERE AMPHUR_ID  = '".$q."'";
$result = mysqli_query($objCon1,$sql);
while($row = mysqli_fetch_array($result)) {
    //echo "<option value='". $row['DISTRICT_ID'] ."'>" .$row['DISTRICT_NAME'] ."</option>" ;
    if($data[2] !=  trim($row['AMPHUR_NAME'])){
        echo "<option value='". $row['DISTRICT_ID'] ."'>" .$row['DISTRICT_NAME'] ."</option>" ;
    }else{
        echo "<option value='{$row['DISTRICT_ID']}' selected >" .$row['DISTRICT_NAME'] . "</option>";
}
}
mysqli_close($objCon1);
?>