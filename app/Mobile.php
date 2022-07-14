<?php

namespace App;

use App\Interfaces\CarrierInterface;
use App\Services\ContactService;

use Exception;

class Mobile
{
	protected $provider;

	function __construct(CarrierInterface $provider)
	{
		$this->provider = $provider;
	}

	public function makeCallByName(string $name = '')
	{
		if (empty($name)) return;

		$contact = ContactService::findByName($name);

		$this->provider->dialContact($contact);

		return $this->provider->makeCall();
	}

	public function sendSms(string $phone, string $body)
	{
		if (!ContactService::validateNumber($phone)) {
			throw new Exception('Invalid phone number');
		}

		return $this->provider->sendSms($phone, $body);
	}
}
