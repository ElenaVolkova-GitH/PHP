<h1>Урок 2. Условные блоки, ветвление функции</h1>

<h4>1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:</h4>
<ul>
    <li>если $a и $b положительные, вывести их разность;</li>
    <li>если $а и $b отрицательные, вывести их произведение;</li>
    <li>если $а и $b разных знаков, вывести их сумму;</li>
</ul>
<p>Ноль можно считать положительным числом.</p>

<?php

$a = rand(-99,99);
$b = rand(-99,99);

define (LEFT_PARENTHESIS,"(");
define (RIGHT_PARENTHESIS,")");
define (NOTHING,"");

if ($a >= 0 and $b >= 0){
    $c = $a - $b;
    echo "Разность положительных чисел a=$a и b =$b составляет $a - $b = $c";
} elseif ($a < 0 and $b < 0){
    $c = $a * $b;
    echo "Произведение отрицательных чисел a=$a и b =$b составляет  ($a) * ($b)  = $c";
} else {
    $c = $a + $b;
    if ($a < 0){
        $la = LEFT_PARENTHESIS;
        $ra = RIGHT_PARENTHESIS;
        $lb = NOTHING;
        $rb = NOTHING;
    } else {
        $lb = LEFT_PARENTHESIS;
        $rb = RIGHT_PARENTHESIS;
        $la = NOTHING;
        $ra = NOTHING;
    }
    echo "Сумма чисел разных знаков a=$a и b =$b составляет  $la$a$ra + $lb$b$rb  = $c";
}

?>

<hr>

<h4>3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.</h4>

<?php

$arg1 = rand(-99,99);
$arg2 = rand(-99,99);

    function sum(int $arg1, int $arg2) {
        return $arg1 + $arg2;
    }

    function subtract(int $arg1, int $arg2) {
        return $arg1 - $arg2;
    }

    function multiply(int $arg1, int $arg2) {
        return $arg1 * $arg2;
    }

    function divide(int $arg1, int $arg2) {
        return $arg1 / $arg2;
    }

?>

<h4>4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).</h4>

<?php

    function mathOperation(int $arg1, int $arg2, $operation) {
        switch ($operation) {
            case "sum" :
                echo "Сумма чисел $arg1 и $arg2 составляет: ";
                echo sum($arg1,$arg2);
                break;
            case "subtract" :
                echo "Разность чисел $arg1 и $arg2 составляет: ";
                echo subtract($arg1,$arg2);
                break;
            case "multiply" :
                echo "Произведение чисел $arg1 и $arg2 составляет: ";
                echo multiply($arg1, $arg2);
                break;
            case "divide" :
                echo "Частное чисел $arg1 и $arg2 составляет: ";
                echo divide($arg1, $arg2);
                break;
        }
    }

    $op = rand(1,4);

    switch ($op) {
        case 1 :
            $operation = "sum";
            break;
        case 2 :
            $operation = "subtract";
            break;
        case 3 :
            $operation = "multiply";
            break;
        case 4 :
            $operation = "divide";
            break;
    }

    mathOperation($arg1,$arg2,$operation);
?>

<hr>

<h4>5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML-шаблон, вывести текущий год в подвале при помощи встроенных функций PHP.</h4>

<?=date('Y')?>
