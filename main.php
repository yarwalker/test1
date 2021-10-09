<?php

require __DIR__ . '/autoload.php';

use services\ArrayService;


$main_array = ['vasya', 'pupkin', 'apple', 23, 41, 55, 1, 2];
$test_array = ArrayService::prepareTestData(array_slice($argv, 1));

// проверка наличия true в массиве
echo (ArrayService::checkTrueExists($main_array) ?
    'В массиве main_array присутствует булево значение TRUE' :
    'В массиве main_array отсутствует булево значение TRUE') . "\n";

echo (ArrayService::checkTrueExists($test_array) ?
        'В массиве test_array присутствует булево значение TRUE' :
        'В массиве test_array отсутствует булево значение TRUE') . "\n";
echo "\n", '-----------------------------------------', "\n";

// объединение массивов
$merged_array = ArrayService::mergeArrays($main_array, $test_array);
var_export($merged_array);
echo "\n", '-----------------------------------------', "\n";

// расхождение массивов
$diff_array = ArrayService::diffArrays($test_array, $main_array);
var_export($diff_array);
echo "\n", '-----------------------------------------', "\n";

// схожие элементы массивов
$intersect_array = ArrayService::intersectArrays($main_array, $test_array);
var_export($intersect_array);
echo "\n", '-----------------------------------------', "\n";

// перевод строк в верхний регистр
$upper_str_array = ArrayService::strUpper($main_array);
var_export($upper_str_array);
echo "\n", '-----------------------------------------', "\n";

// вывод чисел из масива
$number_array = ArrayService::getNumberArray($test_array);
var_export($number_array);
echo "\n", '-----------------------------------------', "\n";

// натуральная сортировка массива
$sorted_array = ArrayService::naturalSortArray($main_array);
var_export($sorted_array);
