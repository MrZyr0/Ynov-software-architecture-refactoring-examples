<?php


namespace App\Managers;


abstract class QueryManager
{
    /**
     * Test if the current request has get parameters
     *
     * @return bool
     */
    public static function hasGetParameters(): bool
    {
        return empty($_GET) ? false : true;
    }

    /**
     * Check if parameter a get param is present in the request
     *
     * @param string $key get param to check
     * @return bool
     */
    public static function isGetParamExist(string $key): bool
    {
        if (!self::hasGetParameters()) {
            return false;
        }

        if (empty($_GET[$key])) {
            return false;
        }

        return true;
    }
}