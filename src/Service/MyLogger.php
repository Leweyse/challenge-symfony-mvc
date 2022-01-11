<?php

namespace App\Service;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MyLogger
{
    public function __construct() {
        // create a log channel
        $this->logger = new Logger('MSG');
    }

    public function handleMSG(String $string): void
    {
        $this->logger->pushHandler(new StreamHandler('./info.log', Logger::DEBUG));

        // add records to the log
        $this->logger->info('New message', ['msg' => $string]);

        // Some examples to diplay warnings and errors
        // $this->logger->warning('Dummy warning!');
        // $this->logger->error('Dummy error!');
    }
}