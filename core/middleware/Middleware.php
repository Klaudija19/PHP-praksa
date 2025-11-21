<?php
namespace core\middleware;

use Exception;

class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
        'auth'  => Auth::class
    ];

    public static function resolve(?string $key)
    {
        if (!$key) return;

        if (!array_key_exists($key, self::MAP)) {
            throw new Exception("Middleware '{$key}' not found.");
        }

        $class = self::MAP[$key];
        (new $class())->handle();
    }
}
