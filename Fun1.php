<?php
 function sum($a,$b)
 {
     return $a+$b;
 }
 function sub($a,$b)
 {
     return $b-$a;
 }
 function mul($a,$b)
 {
     return $a*$b;
 }
$a=10;
$b=20;
echo "Sum of ",$a," and ",$b," is ",sum($a,$b);
echo "<br><br>Subtraction of ",$a," and ",$b," is ",sub($a,$b);
echo "<br><br>Product of ",$a," and ",$b," is ",mul($a,$b);
?>