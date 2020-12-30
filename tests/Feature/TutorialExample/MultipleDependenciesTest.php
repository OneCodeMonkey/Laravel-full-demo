<?php
/**
 * Copyright (c) 2020 OneCodeMonkey, Inc. All Rights Reserved.
 *
 * File: MultipleDependenciesTest.php
 * User: OneCodeMonkey (https://github.com/OneCodeMonkey)
 * Date: 2020/12/30
 * Time: 16:17
 */

namespace Tests\Feature\TutorialExample;

use Tests\TestCase;

class MultipleDependenciesTest extends TestCase
{
    // 测试依赖多个测试用例的情况 ——begin
    public function testProducerFirst()
    {
        $this->assertTrue(true);

        return 'first';
    }

    public function testProducerSecond()
    {
        $this->assertTrue(true);

        return 'second';
    }

    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     */
    public function testConsumer()
    {
        $this->assertEquals(['first', 'second'], func_get_args());
    }
    // 测试依赖多个测试用例的情况 ——end
}