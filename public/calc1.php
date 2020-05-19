<?php
require_once __DIR__ . '\..\config\main.php';
require ENGINE_DIR . "base.php";
require FUNCTIONS_DIR . "calc.php";

$number1 = (int) get('n1');
$number2 = (int) get('n2');
$operation = get('operation');

?>

<h1>Калькулятор</h1>

<form action="" method="get">
    <input name="n1" type="number"/>
    <br>
    <input name="n2" type="number"/>
    <br>
    <input name="operation" value="+" type="submit"/>
    <input name="operation" value="-" type="submit"/>
    <input name="operation" value="*" type="submit"/>
    <input name="operation" value="/" type="submit"/>
    <br>
    <div name="result">
        <?=mathOperation($number1,$number2,$operation)?>
    </div>
</form>




