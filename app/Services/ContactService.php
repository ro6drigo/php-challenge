<?php

namespace App\Services;

use App\Contact;
use App\Interfaces\ContactServiceInterface;

class ContactService implements ContactServiceInterface
{
	public static function findByName(): Contact
	{
		// queries to the db
		return new Contact();
	}

	public static function validateNumber(string $number): bool
	{
		// logic to validate numbers
		return true;
	}
}
