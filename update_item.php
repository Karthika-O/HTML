<?php
$con = mysqli_connect("localhost","root","","PRODUCT_X");
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "UPDATE PRODUCTS SET id=6 where id=7";
if (mysqli_query($con, $sql))
{
  echo "Updated successfully";
} 
else 
{
  echo "Error: " . $sql . "<br>" . mysqli_error($con); 
}
mysqli_close($con);

