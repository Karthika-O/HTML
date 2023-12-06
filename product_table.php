<?php
$con=new mysqli("localhost","root","","PRODUCT_X");
if($con->connect_error)
{
    die("Connection Failed :".$con->connect_error);
}
$sql="CREATE TABLE PRODUCTS(id INT(2) PRIMARY KEY, itemname VARCHAR(30) NOT NULL,price INT(3))";
if ($con->query($sql)==TRUE) {
  echo "Table PRODUCTS created successfully";
} 
else 
{
  echo "Error creating TABLE: ";
}
$con->close();


