<?php
function areaRect(&$l,&$b)
{
    return $l*$b;
}
$l=15;
$b=30;
echo "<center><strong>CALL BY REFERENCE</strong><br><br>";
echo "---------------------------------------<br>";
echo "Area of rectangle with legth 15 and width 30 is ",areaRect($l,$b);
