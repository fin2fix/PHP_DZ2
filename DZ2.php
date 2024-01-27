<?php

// docker run --rm -v ${pwd}/:/cli php:8.2-cli php /cli/dz2.php

// 1. Реализовать основные 4 арифметические операции в виде функции. Обязательно использовать оператор return.

function add(int $arg1, int $arg2): int
{
    return $arg1 + $arg2;
}

function subtract(int $arg1, int $arg2): int
{
    return $arg1 - $arg2;
}

function multiply(int $arg1, int $arg2): float|int
{
    return $arg1 * $arg2;
}

/**
 * @throws Exception
 */
function divide(int $arg1, int $arg2): float|int|string
{
    if ($arg2 == 0) {
        throw new Exception("Divide by 0. Repeat the data entry");
    } else {
        return $arg1 / $arg2;
    }
}

// 2. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 –
// значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции
// выполнить одну из арифметических операций (использовать функции из пункта 1) и вернуть полученное значение
// (использовать switch).

/**
 * @throws Exception
 */
function mathOperation($arg1, $arg2, $operation): void
{
    switch ($operation) {
        case "+":
            echo "$arg1 + $arg2 = " . add($arg1, $arg2) . "\r\n";
            break;
        case "-":
            echo "$arg1 - $arg2 = " . subtract($arg1, $arg2) . "\r\n";
            break;
        case "*":
            echo "$arg1 * $arg2 = " . multiply($arg1, $arg2) . "\r\n";
            break;
        case "/":
            echo "$arg1 / $arg2 = " . divide($arg1, $arg2) . "\r\n";
            break;
        default:
            echo "Incorrect data has been entered. Repeat the data entry, please." . "\r\n";
    }
}

echo "\r\nПервое и второе задание: \r\n";
try {
    mathOperation(20, 5, "+");
} catch (Exception $e) {
}
try {
    mathOperation(20, 5, "-");
} catch (Exception $e) {
}
try {
    mathOperation(20, 5, "*");
} catch (Exception $e) {
}
try {
    mathOperation(20, 5, "/");
} catch (Exception $e) {
}
echo "\r\n";

// 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей,
// а в качестве значений – массивы с названиями городов из соответствующей области.
// Вывести в цикле значения массива, чтобы результат был таким:
// - Московская область: Москва, Зеленоград, Клин...
// - Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт...
// - Рязанская область … (названия городов можно найти на maps.yandex.ru).

$array = [
    'Московская область' => [
        'Москва',
        'Зеленоград',
        'Клин',
        'Домодедово'],
    'Ленинградская область' => [
        'Санкт-Петербург',
        'Всеволожск',
        'Павловск',
        'Кронштадт'],
    'Рязанская область' => [
        'Рязань',
        'Касимов',
        'Скопин',
        'Сасово'],
];

echo "Третье задание:";

foreach ($array as $keyMain => $valueMain) {
    echo "\r\n- " . $keyMain . "\r\n";
    foreach ($valueMain as $key => $value) {
        echo "--- " . $value . "\r\n";
    }
}
echo "\r\n";

// 4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские
// буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
// Написать функцию транслитерации строк.

$alphabet = [
    'а' => 'a', 'б' => 'b', 'в' => 'v',
    'г' => 'g', 'д' => 'd', 'е' => 'e',
    'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
    'и' => 'i', 'й' => 'y', 'к' => 'k',
    'л' => 'l', 'м' => 'm', 'н' => 'n',
    'о' => 'o', 'п' => 'p', 'р' => 'r',
    'с' => 's', 'т' => 't', 'у' => 'u',
    'ф' => 'f', 'х' => 'h', 'ц' => 'c',
    'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
    'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
    'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
];

function transliterate(string $russianString): string
{
    global $alphabet;
    $englishString = "";
    $array = mb_str_split($russianString);

    foreach ($array as $keyRussian => $valueRussian) {
        foreach ($alphabet as $keyAlphabet => $valueAlphabet) {
            if ($valueRussian == $keyAlphabet) {
                $englishString .= $valueAlphabet;
            }
        }
    }
    return $englishString;
}

echo "Четвертое задание: \r\n";
echo transliterate("привет");
echo "\r\n";

// 5. *С помощью рекурсии организовать функцию возведения числа в степень.
// Формат: function power($val, $pow), где $val – заданное число, $pow – степень.

/**
 * @throws Exception
 */
function power(float $val, int $pow): float
{
    if ($val == 0 && $pow <= 0) {
        throw new Exception("It is impossible to raise 0 to a power less than 1");
    }
    if ($val == 1 || $val == 0) {
        return $val;
    } elseif ($pow > 1) {
        return $val * power($val, --$pow);
    } elseif ($pow < 1) {
        return 1 / $val * power($val, ++$pow);
    } else {
        return $val;
    }
}

echo "\r\nПятое задание: \r\n";
try {
    echo power(2, 5);
} catch (Exception $e) {
}
echo " \r\n";