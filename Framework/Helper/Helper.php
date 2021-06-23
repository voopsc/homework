<?php

declare(strict_types=1);

namespace Framework\Helper;

/**
 *
 */
class Helper
{
    /**
     * Create filepath string from array by implode function
     *
     * @param array $pathArr array with path "steps"
     *
     * @return string|null
     */
    public static function getFilepathString(array $pathArr): ?string
    {
        if (!empty($pathArr)) {
            return (implode(DIRECTORY_SEPARATOR, $pathArr));
        }
        return null;
    }


    /**
     * Require once a file by path
     *
     * @param array $pathArr array with directories to a file
     *
     * @return void
     */
    public static function requireFile(array $pathArr)
    {
        $filepath = self::getFilepathString($pathArr);

        if (file_exists($filepath)) {
            require_once($filepath);
        }
    }


    /**
     * Return link of prev page by http_ref
     *
     * @return string
     */
    public static function getRefererURI(): string
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            return (string)$_SERVER['HTTP_REFERER'];
        }
        return '/';
    }
}
