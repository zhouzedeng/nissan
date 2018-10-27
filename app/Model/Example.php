<?php

namespace App\Model;

use DB;
use Log;

/**
 * Class Example
 * @package App\Model
 */
class Example extends Base
{
	const DB = 'base';
	const DEL = 'deleted_at';
	const DEL_VAL = 0;
	const ID = 'id';
	const TABLE = 'example';
	const UPDATE = 'updated_at';

    /**
     * test
     * @return string
     */
    public static function test()
    {
        return __METHOD__;
    }
}
