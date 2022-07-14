<?php

namespace App;

class Contact
{
	private string $name;
	private string $phone;

	function __construct(string $name, string $phone)
	{
		$this->name = $name;
		$this->phone = $phone;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getPhone()
	{
		return $this->phone;
	}
}
