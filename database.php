<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<table class="table table-striped">

<?php

//Connect to the Database
$servername = "localhost";
$username = "root";
$password = "root";

try {
  $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  echo '<div class="alert alert-success"><strong>Connected successfully!</strong></div>';

} catch(PDOException $e) {
  echo '<div class="alert alert-danger"><strong>Connection failed!</strong></div>';
  
}



if($_GET["name"] == '')

   echo '<div class="alert alert-danger"><strong>No regulations were found for this ID</strong></div>';

else{

    $id = $_GET["name"];

    $sql = "SELECT * FROM yordas_digital__recruitment_exe WHERE `EC number` = '$id' OR `CAS number` = '$id'";

    $result = $conn->query($sql);

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {

    if($row > 0){

        $id2 = $row["Substance ID"];

        $sql2 = "SELECT * FROM substances_on_reach_svhc_candid WHERE substances_on_reach_svhc_candid.Substances = '$id2' UNION SELECT * FROM substances_on_tsd_list WHERE substances_on_tsd_list.Substances = '$id2' ";

        $result2 = $conn->query($sql2);

        while($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {

            echo '<thead><tr><th> Regulations: </th></tr></thead>';

            echo '<tbody><tr><td>'.$row2["Related Information"].'</td></tr><tr></tbody>';

            echo '<thead><tr><th> Chemical substances: </th></tr></thead>';

            $subName = explode(";",$row["Substance name"]);

            foreach($subName as $subString){

                echo '<tbody><tr><td>'.$subString.'</td></tr><tr></tbody>';

            }

        }

        //echo '<thead><tr><th> Substance ID: </th></tr></thead>';

        //echo '<tbody><tr><td>'.$row["Substance ID"].'</td></tr><tr></tbody>';

    }else

        echo '<div class="well well-sm">No results were found</div>';

    }
}


?>

</body>
</html>