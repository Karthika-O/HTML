<?php
$con = mysqli_connect("localhost","root","","PRODUCT_X");
$sql="SELECT * FROM PRODUCTS";
$result=$con->query($sql);
if($result->num_rows>0)
{
    echo "<table border=1>";
    echo "<tr><td>Id</td><td>Name</td><td>Price</td></tr>";
    while($row=$result->fetch_assoc())
    {
        echo "<tr><td>".$row["id"]."</td><td>".$row["itemname"]."</td><td>".$row["price"]."</td></tr><br>";
    }
      echo "</table>";
}