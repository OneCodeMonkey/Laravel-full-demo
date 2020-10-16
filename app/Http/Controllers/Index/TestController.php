<?php

/**
 * Copyright (c) 2020 OneCodeMonkey, Inc. All Rights Reserved.
 *
 * File: Test.php
 * User: OneCodeMonkey (https://github.com/OneCodeMonkey)
 * Date: 2020/9/24
 * Time: 14:30
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function __invoke()
    {
        return 'aa';
    }

    public function show()
    {
        $minMax = DB::table('users')
            ->selectRaw('min(id) as min, max(id) as max')
            ->first();

        $min = $minMax->min;
        $max = $minMax->max;
        $randOffset = random_int($min, $max);

        $data = DB::table('users')
//            ->where('created_at', '2019-09-26 07:48:58')
            ->whereRaw("id >= {$randOffset}")
            ->limit(1)
            ->inRandomOrder()
            ->get();

        return view('test', ['data' => json_encode($data)]);
    }
}
