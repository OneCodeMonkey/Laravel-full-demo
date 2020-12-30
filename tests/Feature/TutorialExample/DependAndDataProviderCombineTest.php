<?php
/**
 * Copyright (c) 2020 OneCodeMonkey, Inc. All Rights Reserved.
 *
 * File: DependAndDataProviderCombineTest.php
 * User: OneCodeMonkey (https://github.com/OneCodeMonkey)
 * Date: 2020/12/30
 * Time: 16:57
 */

namespace Tests\Feature\TutorialExample;

use Tests\TestCase;

class DependAndDataProviderCombineTest extends TestCase
{
    /**
     * 注意：当 dataProvider 和 depend 同时使用，dataProvider 的用例会优先被传入，然后再是 depend
     */
    public function provider()
    {
        return [
            ['provider1', 'provider2'],
            ['provider3', 'provider4'],
        ];
    }

    public function testProducerFirst()
    {
        $this->assertTrue(1 == 1);
        return 'first';
    }

    public function testProducerSecond()
    {
        $this->assertTrue(1 == 1);
        return 'second';
    }

    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     * @dataProvider provider
     */
    public function testConsumer()
    {
        $this->assertTrue(in_array(func_get_args(), [['provider1', 'provider2', 'first', 'second'], ['provider3', 'provider4', 'first', 'second']]));
    }
}