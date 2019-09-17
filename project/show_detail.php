<?php 
$id_detail = $_GET["id_detail"];
include("configdatabase.php");
$sql = "SELECT * FROM par_nan_data WHERE id = $id_detail";
$result=mysqli_query($objCon,$sql);
$data = array();
while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
   for($i = 0; $i <= 17; $i++){
       $data[] = $row[$i];
   }
}
//echo($data[17]);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }

    .carousel-inner img {
      width: 100%; 
      min-height: 200px;
    }

    @media (max-width: 600px) {
      .carousel-caption {
        display: none; 
      }
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Thai Fabric</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
<div class="row">
  <div class="col-sm-8">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="<?php echo($data[13]) ?>" alt="Image">
          <div class="carousel-caption">
          </div>      
        </div>

        <?php 
        for($i = 14; $i <= 17; $i++){
            if($data[$i] != "uploads/"){

        ?>
        <div class="item">
          <img src="<?php echo($data[$i]) ?>" alt="Image">
          <div class="carousel-caption">
          </div>      
        </div>
            <?php 
              }else{

              }
          }
             ?>
        </div>

      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="well">
    <center><h3>รายละเอียด</h3></center>
    <br>
      <h4>ชื่อผ้าทอ  :  <?php echo($data[5]); ?></h4>
      <h4>ประเภทการทอ  :  <?php echo($data[6]); ?></h4>
      <h4>ชนิดผ้าทอ  :  <?php echo($data[7]); ?></h4>
      <h4>รายละเอียดผ้าทอ  :  <?php echo($data[11]); ?></h4>
      <h4>ผู้ทอผ้า/ผู้ให้ข้อมูล  :  <?php echo($data[12]); ?></h4>
      <h4>ความรู้สึก/อารมณ์บนลายผ้า  :  <?php echo($data[10]); ?></h4>
      <h4>ราคา  :  <?php echo($data[9]); ?></h4>
      <h4>เบอร์ติดต่อ  :  <?php echo($data[8]); ?></h4>
      <h4>หมู่บ้าน  :  <?php echo($data[1]); ?></h4>
      <h4>ตำบล  :  <?php echo($data[2]); ?></h4>
      <h4>อำเภอ  :  <?php echo($data[3]); ?></h4>
      <h4>จังหวัด  :  <?php echo($data[4]); ?></h4>
      <a href="index.php" class="btn btn-info" >กลับหน้าหลัก</a>
    </div>
   
  </div>
</div>
<hr>
</div>

<footer class="container-fluid text-center">
  <p>Power By RMUTL Nan</p>
</footer>

</body>
</html>
