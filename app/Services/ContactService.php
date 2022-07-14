<?php

namespace App\Services;

use App\Contact;
use App\Interfaces\ContactServiceInterface;

use Exception;

class ContactService implements ContactServiceInterface
{
	const CONTACTS = [
		[
			'name' => 'Rodrigo',
			'phone' => '123 456 789',
		],
	];

	public static function findByName(string $name): Contact
	{
		// queries to the db
		$key = array_search($name, array_column(self::CONTACTS, 'name'));

		if ($key === false) {
			throw new Exception('Contact not exists');
		}

		return new Contact(self::CONTACTS[$key]['name'], self::CONTACTS[$key]['phone']);
	}

	public static function validateNumber(string $number): bool
	{
		// logic to validate numbers
		$key = array_search($number, array_column(self::CONTACTS, 'phone'));

		return $key === false ?  false : true;
	}
}
