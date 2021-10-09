<?php

namespace services;

class ArrayService
{
    public static function checkTrueExists(array $test): bool
    {
        return in_array(true, $test, true);
    }

    public static function mergeArrays(array $arr1, array $arr2): array
    {
        return array_merge($arr1, $arr2);
    }

    public static function diffArrays(array $arr1, array $arr2): array
    {
        return array_udiff($arr1, $arr2, function($a, $b) { return $a <=> $b; });
    }

    public static function intersectArrays(array $arr1, array $arr2): array
    {
        return array_intersect($arr1, $arr2);
    }

    public static function strUpper(array $arr): array
    {
        return array_map(function($item) {
            return is_string($item) ? strtoupper($item) : $item;
        }, $arr);
    }

    public static function getNumberArray(array $arr): array
    {
        return array_filter($arr, function ($item) {
            return is_numeric($item);
        });
    }

    public static function naturalSortArray(array $arr): array
    {
        natsort($arr);
        return $arr;
    }
    public static function prepareTestData(array $test)
    {
        return array_map('self::testItem', $test);
    }

    public static function testItem($item)
    {
        $result = null;
        $item = str_replace(',', '.', $item);

        if (is_numeric($item)) {
            // числовое значение
            $result = strpos($item, '.') === false ? intval($item) : floatval($item);
        } elseif (in_array($item, ['true', 'false'])) {
            // булево значение
            $result = $item === 'true' ? true : false;
        } else {
            // строковое значение
            $result = $item;
        }

        return $result;
    }
}
