<?php

namespace App\Service;

class Dashes implements TransformInterface
{
    public function transform(String $string): string
    {
        $arr = explode(" ", $string);

        $result = implode('-', $arr);

        return $result;
    }
}