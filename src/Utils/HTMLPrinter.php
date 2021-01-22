<?php


namespace App\Utils;


abstract class HTMLPrinter
{
    /**
     * Print string to html and exit
     *
     * @param string $data to print
     */
    public static function printToHTMLandExit(string $data): void
    {
        echo $data;
        exit;
    }
}
