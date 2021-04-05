<?php

include("../conn/conn.php");
$capital = array();

$query = "SELECT * FROM country_capital ORDER BY id ASC";

$result = $conn->query($query);

if ($result->num_rows > 0) {

   while($row = $result->fetch_assoc()) {
      $data = array();
      $data["id"]=$row["id"];
      $data["country_name"]=$row["country_name"];
      $data["capital_name"]=$row["capital_name"];
      array_push($capital, $data);

  }

  if($result){

     echo json_encode($capital,JSON_PRETTY_PRINT);

  }

 else{
     echo json_encode("Error in query try again" , JSON_PRETTY_PRINT);
 }

 }

 else {
   echo json_encode("No Records Found" ,JSON_PRETTY_PRINT);
 }

$conn->close();
?>
