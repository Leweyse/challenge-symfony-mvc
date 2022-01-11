<?php

namespace App\Service;

interface TransformInterface
{
    public function transform(String $string): string;
}