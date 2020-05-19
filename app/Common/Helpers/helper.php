<?php

if (!function_exists('uuid')) {
    /**
     * 生成 uuid
     *
     * md5(md5(毫秒时间戳) + uniqid())
     *
     * @return string
     */
    function uuid() {
        return md5(md5(floor((explode(' ', microtime())[0] + explode(' ', microtime())[1]) * 1000)) . uniqid());
    }
}
