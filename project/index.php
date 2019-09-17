<?php 
include("configdatabase.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thai Fabric</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style> 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }

body {
    font-family: Arial;
}

* {
    box-sizing: border-box;
}

form.example input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
}

form.example button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
}

form.example button:hover {
    background: #0b7dda;
}

form.example::after {
    content: "";
    clear: both;
    display: table;
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
      <a class="navbar-brand" href="#">Thai Fabric</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid bg-3 text-center">   
<br> 
  <h3>Thai Fabric</h3>
  <?php include("search.php"); ?>
  <br>
  <div class="row">

<?php
  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
?>

    <div class="col-sm-3">
        <img src="<?php echo($row["part_img"]); ?>" class="img-rounded" style="width:100%" alt="Image">
          <br>
            <h4><?php echo($row["name_par_tor"]); ?></h4>
            <a href="show_detail.php?id_detail=<?php echo($row["id"]); ?>" class="btn btn-info" >รายละเอียด</a>
          <br>
      <br>
      <br>
    </div>
<?php 
    }
 ?>

  </div>
</div>

<footer class="container-fluid text-center">
  <p>Power By RMUTL Nan</p>
</footer>

</body>
</html>


