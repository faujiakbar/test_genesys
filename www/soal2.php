<?php

$x=9;

$tmp = array();
$max = ($x*2)-1;
$i = 1;

while($i<=$x){
    $j = 0;
    $tmp[$i] = "";
    while($j<$max){
        if(($j < $x && $j >= ($x-$i)) || ($j > ($x-1) && $j <= (($x-2)+$i))){
            $tmp[$i] .= "*";
        }
        else $tmp[$i] .= "-";

        $j++;
    }
    $i++;
}

foreach($tmp as $i => $val){
    print_r($val."<br>");
}

?>