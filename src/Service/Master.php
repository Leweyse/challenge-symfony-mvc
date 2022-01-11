<?php

namespace App\Service;

class Master
{
    public function __construct(Capitalize $capitalize, Dashes $dashes, MyLogger $logger) {
        $this->capitalize = $capitalize;
        $this->dashes = $dashes;
        $this->logger = $logger;
    }

    public function capitalize(String $string): string
    {
        return $this->capitalize->transform($string);
    }

    public function dashes(String $string): string
    {
        return $this->dashes->transform($string);
    }

    public function logger(String $string): void
    {
        $this->logger->handleMSG($string);
    }
}