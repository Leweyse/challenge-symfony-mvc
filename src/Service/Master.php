<?php

namespace App\Service;

class Master
{
    public function __construct(TransformInterface $capitalize, TransformInterface $dashes) {
        $this->capitalize = $capitalize;
        $this->dashes = $dashes;
    }

    public function capitalize(String $string): string
    {
        return $this->capitalize->transform($string);
    }

    public function dashes(String $string): string
    {
        return $this->dashes->transform($string);
    }
}