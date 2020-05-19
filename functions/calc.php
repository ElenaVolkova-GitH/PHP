<?php

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
    if($arg2 != 0) {
        return $arg1 / $arg2;
    } elseif($arg1 != 0) {
        return "Infinity";
    } else {
        return "Undefined";
    }

}

function mathOperation(int $arg1, int $arg2, $operation) {
    switch ($operation) {
        case "+" :
            echo "$arg1 $operation $arg2 = ";
            echo sum($arg1,$arg2);
            break;
        case "-" :
            echo "$arg1 $operation $arg2 = ";
            echo subtract($arg1,$arg2);
            break;
        case "*" :
            echo "$arg1 $operation $arg2 = ";
            echo multiply($arg1, $arg2);
            break;
        case "/" :
            echo "$arg1 $operation $arg2 = ";
            echo divide($arg1, $arg2);
            break;
    }
}