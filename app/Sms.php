<?php

namespace App;

class Sms
{
    private string $phone;
    private string $body;

    function __construct(string $phone, string $body)
    {
        $this->phone = $phone;
        $this->body = $body;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getBody()
    {
        return $this->body;
    }
}
