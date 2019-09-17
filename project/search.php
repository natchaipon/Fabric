<?php
  include("configdatabase.php");
	ini_set('display_errors', 1);
    error_reporting(~0);
    
	$strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
	}
?>

<form class="example" name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Search.." onfocus="this.value=''" name="txtKeyword"  id="txtKeyword" value="<?php echo $strKeyword;?>">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>


<?php

$sql = "SELECT * FROM par_nan_data WHERE id LIKE '%".$strKeyword."%' OR
                                         mu_ban LIKE '%".$strKeyword."%' OR
                                         district LIKE '%".$strKeyword."%' OR
                                         amphur LIKE '%".$strKeyword."%' OR
                                         province LIKE '%".$strKeyword."%' OR
                                         name_par_tor LIKE '%".$strKeyword."%' OR
                                         par_pet_kan_tor LIKE '%".$strKeyword."%' OR
                                         cha_nit_par_tor LIKE '%".$strKeyword."%' OR
                                         miss_call LIKE '%".$strKeyword."%' OR
                                         price LIKE '%".$strKeyword."%' OR
                                         des LIKE '%".$strKeyword."%' OR
                                         ar_rom LIKE '%".$strKeyword."%' ";
$result=mysqli_query($objCon,$sql);

?>

