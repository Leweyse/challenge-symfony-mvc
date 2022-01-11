<?php

namespace App\Service;

class Master
{
    public function __construct(TransformInterface $capitalize, TransformInterface $dashes)
    {
        $this->capitalize = $capitalize;
        $this->dashes = $dashes;
    }

    public function transformer(String $string, String $transformationClass): string
    {
        return $this->$transformationClass->transform($string);
    }
}