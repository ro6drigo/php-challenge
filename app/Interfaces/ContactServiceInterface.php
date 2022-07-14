<?php

namespace App\Interfaces;

use App\Contact;

interface ContactServiceInterface
{
    public static function findByName(string $name): Contact;

    public static function validateNumber(string $number): bool;
}
