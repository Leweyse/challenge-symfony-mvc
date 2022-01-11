<?php

namespace App\Service;

class Capitalize implements TransformInterface
{
    public function transform(String $string): string
    {
        $arr = str_split($string);

        $result = [];

        for ($i=0; $i < count($arr); $i++) { 
            if ($i % 2 === 0) {
                $result[$i] = strtolower($arr[$i]);
            } else {
                $result[$i] = strtoupper($arr[$i]);
            }
        }

        return implode($result);
    }
}