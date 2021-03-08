<?php

/**
 * @Author: kidkang
 * @Date:   2021-03-09 07:45:40
 * @Last Modified by:   kidkang
 * @Last Modified time: 2021-03-09 07:47:41
 */
declare (strict_types = 1);

namespace Yjtec\Hashids\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string encode(mixed ...$numbers)
 * @method static array decode(string $hash)
 * @method static string encodeHex(string $str)
 * @method static string decodeHex(string $hash)
 * @method static \Hashids\Hashids connection(string|null $name = null)
 */
class Hashids extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'hashids';
    }
}
