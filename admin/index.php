<?php

$batch = 111; // index datatype
$name ="IMC"; // string datatype
$temp = 33.5; // float datatype
echo "<b><em>Hello Batch $batch, welcome to ecommerce module!</em></b>";

//defining function
function power($num1, $num2) 
{ 
    return pow($num1, $num2);
}

$number1 = 2;
$number2 = 6;
$result = power($number1, $number2); //calling function
echo "<br>result is $result";

?>