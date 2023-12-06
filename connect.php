<?php
$con=new mysqli("localhost","root","");
if($con->connect_error)
{
    die("Connection Failed :".$con->connect_error);
}

$s="CREATE DATABASE PRODUCT_X";
if($con->query($s)==TRUE)
{
    echo "Database created successfully with the name PRODUCT";
}
else 
{
    echo "Error creating database: " ;
}
$con->close();

 
