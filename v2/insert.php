<?php

include("../conn/conn.php");
 $response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $name_of_country = mysqli_real_escape_string($conn, $_POST['country_name']);
      $name_of_capital = mysqli_real_escape_string($conn, $_POST['capital_name']);

      $query = "INSERT INTO country_capital(country_name , capital_name)
                VALUES('$name_of_country' , '$name_of_capital')";


      if ($conn->query($query) === TRUE) {

        $response['success']=1;
        $response['message']="Record Insert Successfully...";

      }

    else {

      $response['success']=0;
      $response['message']="Error In Sql Query ...";
     }

}

else{

  $response['success']=0;
  $response['message']="method invaild check method";
}

echo json_encode($response);
$conn->close();
?>
