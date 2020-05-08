<?php

/*
1. С помощью цикла while вывести все числа в промежутке от 0 до 100,
которые делятся на 3 без остатка.
*/

function multipleOf(int $initialNumber, int $lastNumber, int $base) {
    $number = $initialNumber;
    while ($number <= $lastNumber) {
        if ($number % $base == 0) {
            echo $number , "<br>";
            $number++;
        }
        $number++;
    }
}



/*
2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10,
чтобы результат выглядел так:
0 – это ноль.
1 – нечетное число.
2 – четное число.
3 – нечетное число.
…
10 – четное число.
*/

function zeroOddEven(int $initialNumber, int $lastNumber) {
    $number = $initialNumber;
    do {
        if ($number == 0) {
            echo $number , " – это ноль.<br>";
            $number++;
        } elseif ($number % 2 != 0) {
            echo $number , " – нечетное число.<br>";
            $number++;
        } else {
            echo $number , " – четное число.<br>";
            $number++;
        }
    } while ($number <= $lastNumber);
}



/*
3. Объявить массив, в котором в качестве ключей будут использоваться названия областей,
а в качестве значений – массивы с названиями городов из соответствующей области.
Вывести в цикле значения массива, чтобы результат был таким:
Московская область:
Москва, Зеленоград, Клин
Ленинградская область:
Санкт-Петербург, Всеволожск, Павловск, Кронштадт
Рязанская область … (названия городов можно найти на maps.yandex.ru)
*/

$regionsArray = [
    'Московская область' => [
        'Москва',
        'Зеленоград',
        'Клин'
    ],
    'Ленинградская область' => [
        'Санкт-Петербург',
        'Всеволожск',
        'Павловск',
        'Кронштадт'
    ],
    'Рязанская область' => [
        'Рязань',
        'Касимов',
        'Сасово',
        'Скопин'
    ]
];

function citiesOfRegion($array) {
    if (!is_array($array)) {
        echo "На входе функция принимает массив. Некорректный аргумент.";
    }
    foreach ($array as $key => $item) {
        echo $key , ":<br>";
        for ($i = 0; $i < count($array[$key]); $i++) {
            if ($i == (count($array[$key]) - 1)) {
                echo $array[$key][$i] , " <br>";
            } else {
                echo $array[$key][$i] , ', ';
            }
        }
    }
    unset($item);
}



/*
4. Объявить массив, индексами которого являются буквы русского языка,
а значениями – соответствующие латинские буквосочетания
(‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
Написать функцию транслитерации строк.
*/
function transliterate($text) {

    $letters = [
        "а" => "a",
        "б" => "b",
        "в" => "v",
        "г" => "g",
        "д" => "d",
        "е" => "e",
        "ё" => "yo",
        "ж" => "zh",
        "з" => "z",
        "и" => "i",
        "й" => "y",
        "к" => "k",
        "л" => "l",
        "м" => "m",
        "н" => "n",
        "о" => "o",
        "п" => "p",
        "р" => "r",
        "с" => "s",
        "т" => "t",
        "у" => "u",
        "ф" => "f",
        "х" => "kh",
        "ц" => "ts",
        "ч" => "ch",
        "ш" => "sh",
        "щ" => "sch",
        "ъ" => "",
        "ы" => "i",
        "ь" => "",
        "э" => "e",
        "ю" => "yu",
        "я" => "ya"
    ];

    $rusArray = mb_str_split($text);
    $transArray = [];

    foreach($rusArray as $textKey => $textItem) {
        if(isset($letters[$textItem])){
            $transArray[] = $letters[$textItem];
        } elseif(isset($letters[mb_strtolower($textItem)])){
            $transArray[] = strtoupper($letters[mb_strtolower($textItem)]);
        } else {
            $transArray[] = $textItem;
        }
    }

    return implode('', $transArray);

}



/*
5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает
видоизмененную строчку.
*/

function snakeCase($text)
{
    $arrayText = mb_str_split($text);

    foreach($arrayText as $key => $item) {
        if ($item == " ") {
            $arrayText[$key] = "_";
        }
    }
    unset($item);

    return implode('', $arrayText);
}



/*
6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.
*/

$menu = [
    'About us',
    'Best choice' => [
            'item 1',
            'item 2',
            'item 3'
    ],
    'Catalog' => [
            'Section 1' => [
                    'item',
                    'item',
                    'item',
            ],
            'Section 2' => [
                    'item',
                    'item',
                    'item',
            ],
            'Section 3' => [
                    'item',
                    'item',
                    'item',
            ],
    ]
];

function dynamicMenu($array) {

    if (!is_array($array)) {
        return "На входе функция принимает массив. Некорректный аргумент.";
    }

    $menuArr[] = '<ul>';
    foreach ($array as $key => $item) {
        if (is_array($item)) {
            $menuArr[] = '<li>';
            $menuArr[] = $key;
            $menuArr[] = dynamicMenu($item);
            $menuArr[] = '</li>';
        } else {
            $menuArr[] = '<li>';
            $menuArr[] = $item;
            $menuArr[] = '</li>';
        }
    }
    unset($item);
    $menuArr[] = '</ul>';

    return implode('', $menuArr);
}

?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Урок 3. Циклы и массивы</h1>

    <h3>1. С помощью цикла while вывести все числа в промежутке от 0 до 100,
        которые делятся на 3 без остатка.</h3>

    <?php multipleOf(0,100,3); ?>

    <h3>2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10,
        чтобы результат выглядел так: <br><br>
        0 – это ноль.<br>
        1 – нечетное число.<br>
        2 – четное число.<br>
        3 – нечетное число.<br>
        …<br>
        10 – четное число.</h3><br>

    <?php zeroOddEven(0,10) ?>

    <h3>3. Объявить массив, в котором в качестве ключей будут использоваться названия областей,
        а в качестве значений – массивы с названиями городов из соответствующей области.
        Вывести в цикле значения массива, чтобы результат был таким: <br><br>
        Московская область:<br>
        Москва, Зеленоград, Клин<br>
        Ленинградская область:<br>
        Санкт-Петербург, Всеволожск, Павловск, Кронштадт<br>
        Рязанская область … (названия городов можно найти на maps.yandex.ru)</h3>

    <?php citiesOfRegion($regionsArray); ?>

    <h3>4. Объявить массив, индексами которого являются буквы русского языка,
        а значениями – соответствующие латинские буквосочетания
        (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
        Написать функцию транслитерации строк.</h3>

    <?php echo transliterate('Привет всем');
    echo transliterate('Московская область:
Москва, Зеленоград, Клин
Ленинградская область:
Санкт-Петербург, Всеволожск, Павловск, Кронштадт
Рязанская область:
Рязань, Касимов, Сасово, Скопин'); ?>

    <h3>5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает
        видоизмененную строчку.</h3>

    <?php echo snakeCase('Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.'); ?>

    <h3>6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.
        </h3>

    <ul class="menu"> Menu
        <?php echo dynamicMenu($menu) ?>
    </ul>

</body>
</html>
