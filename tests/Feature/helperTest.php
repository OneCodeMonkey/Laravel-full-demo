<?php

namespace Tests\Feature;

use Tests\TestCase;

class helperTest extends TestCase
{
    public function testUuidGenerater()
    {
        $uuid = uuid();

        // 测试结果是 32 位小写字母和数字的组合
        $this->assertTrue(1 == preg_match('/^[a-z0-9]{32}$/', $uuid));
    }

    public function testUuidUnique()
    {
        $uuid = uuid();

        // 同时生成十万个 uuid，判断是否无重复
        $check = [];
        for ($i = 0; $i < 100000; $i++) {
            $check[] = uuid();
        }

        $total = count($check);
        $unique = count(array_unique($check));

        $this->assertTrue($total == $unique, "uuid 生成有重复!");
    }
}
