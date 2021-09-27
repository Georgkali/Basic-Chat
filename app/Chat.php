<?php

namespace app;

use League\Csv\Writer;
use League\Csv\Reader;

class Chat
{
    private Writer $writer;
    private Reader $reader;


    public function __construct()
    {
        $this->writer = Writer::createFromPath('app/chat.csv', 'a+');
        $this->reader = Reader::createFromPath("app/chat.csv", "r");

    }

    public function writer(): Writer
    {
        return $this->writer;
    }

    public function reader(): Reader
    {
        return $this->reader;
    }
}