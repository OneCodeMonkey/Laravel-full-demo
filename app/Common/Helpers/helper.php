<?php

if (!function_exists('uuid')) {
    /**
     * 生成 uuid
     *
     * md5(md5(毫秒时间戳) + uniqid())
     *
     * @return string
     */
    function uuid()
    {
        return md5(md5(floor((explode(' ', microtime())[0] + explode(' ', microtime())[1]) * 1000)) . uniqid());
    }
}

if (!function_exists('formatTimestamp')) {
    function formatTimestamp($timestamp)
    {
        $nowTime = time();
        $showTime = is_numeric($timestamp) ? $timestamp : strtotime($timestamp);
        $dur = $nowTime - $showTime;
        if ($dur < 180) {
            return '刚刚';
        } else {
            if ($dur < 3600) {
                return floor($dur / 60) . '分钟前';
            } else {
                if ($dur < 86400) {
                    return floor($dur / 3600) . '小时前';
                } else {
                    return date("n月j日 H:i", $showTime);
//                    if ($dur < 864000) {
//                        return floor($dur / 86400) . '天前';
//                    } else {
//                        return date("Y-m-d", $showTime);
//                    }
                }
            }
        }
    }
}