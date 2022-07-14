<?php

namespace App\Interfaces;

use App\Call;
use App\Contact;
use App\Sms;

interface CarrierInterface
{
	public function dialContact(Contact $contact): string;

	public function makeCall(): Call;

	public function sendSms(string $phone, string $body): Sms;
}
