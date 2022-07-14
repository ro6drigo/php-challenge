<?php

namespace App\Carriers;

use App\Interfaces\CarrierInterface;

use App\Call;
use App\Contact;
use App\Sms;

class FirstCarrier implements CarrierInterface
{
    public function dialContact(Contact $contact): string
    {
        return 'dialing contact';
    }

    public function makeCall(): Call
    {
        return new Call();
    }

    public function sendSms(string $number, string $body): Sms
    {
        return new Sms($number, $body);
    }
}
