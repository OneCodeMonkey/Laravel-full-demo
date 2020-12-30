<?php
/**
 * Copyright (c) 2020 OneCodeMonkey, Inc. All Rights Reserved.
 *
 * File: DataTest.php
 * User: OneCodeMonkey (https://github.com/OneCodeMonkey)
 * Date: 2020/12/30
 * Time: 16:29
 */

namespace Tests\Feature\TutorialExample\DataProviderTest;

use Tests\TestCase;

require 'CsvFileIterator.php';

class DataTest extends TestCase
{
    /**
     * dataProvider 用法注意事项：
     * 1. dataProvider 的方法必须是 public
     * 2. dataProvider 方法的返回值要么是 array，要么实现了 iterator 接口，且迭代的每一步都要生成一个数组。
     *
     */

    /**
     * @dataProvider additionProvider
     * @dataProvider additionProvider2
     * @dataProvider additionProvider3
     * @param $a
     * @param $b
     * @param $expected
     */
    public function testAdd($a, $b, $expected)
    {
        $this->assertEquals($expected, $a + $b);
    }

    public function additionProvider()
    {
        return [
            [0, 1, 1],
            [1, 2, 3],
            [34, 456, 490],
            [11231, 12123, 23354],
        ];
    }

    public function additionProvider2()
    {
        return [
            'test data 1' => [0, 1, 1],
            'test data 2' => [1, 2, 3],
            'test data 3' => [34, 456, 490],
            'test data 4' => [11231, 12123, 23354],
        ];
    }

    // 迭代方式的 dataProvider
    public function additionProvider3()
    {
        return new CsvFileIterator(getcwd() . '/tests/Feature/TutorialExample/DataProviderTest/data.csv');
    }
}