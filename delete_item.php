<?php
$con = mysqli_connect("localhost","root","","PRODUCT_X");
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "DELETE FROM PRODUCTS where id=6";
if (mysqli_query($con, $sql)) 
{
  echo "record deleted successfully";
} 
else 
{
  echo "Error: " . $sql . "<br>" . mysqli_error($con); 
}
mysqli_close($con);



