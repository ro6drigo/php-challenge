<?php

namespace App\Interfaces;

use App\Contact;

interface ContactServiceInterface
{
    public static function findByName(): Contact;

    public static function validateNumber(string $number): bool;
}
