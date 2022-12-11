<?php
$operation = htmlentities($_GET["x"]);
$number = htmlentities($_GET["cA"]);
$number2 = htmlentities($_GET["cB"]);
if(!$number || !$number2 || !is_numeric($number) || !is_numeric($number2)){
    print_r(["report" => "Cislo neni cislo"]);
    exit;
}
switch($operation){
    default:
        print_r(["report" => "Operator neni operator"]);
        exit;
    case "add" || "sum":
        $number3 = $number + $number2;
        break;
    case "sub":
        $number3 = $number - $number2;
        break;
    case "mul":
        $number3 = $number * $number2;
        break;
    case "div":
        $number3 = $number / $number2;
        break;
}
print_r(["report" => "Vse v poradku", "vysledek " => $number3]);