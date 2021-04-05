# PHP & Retrofit Library App
 
- PHP Version 7.4.16
- Mysql Version 5.3.8

## conn.php

```php

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "countries";


// Create connection
$conn = new mysqli($servername, $username, $password , $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

```
## insert.php

```php
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

```

## list.php

```php

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

```

#Done Work!
