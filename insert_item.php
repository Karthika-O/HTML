<?php
$con = mysqli_connect("localhost","root","","PRODUCT_X");
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO PRODUCTS (id,itemname,price)
VALUES ('5','curd','35')";
if (mysqli_query($con, $sql)) 
{
  echo "New record created successfully";
} 
else 
{
  echo "Error: " . $sql . "<br>" . mysqli_error($con); 
}
mysqli_close($con);

