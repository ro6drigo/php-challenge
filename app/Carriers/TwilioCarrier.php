<?php

namespace App\Carriers;

use App\Interfaces\CarrierInterface;

use Twilio\Rest\Client;

use App\Call;
use App\Contact;
use App\Sms;

class FirstCarrier implements CarrierInterface
{
    private $sid = '[SID]';
    private $token = '[AuthToken]';

    public function dialContact(Contact $contact): string
    {
        return 'dialing contact on Twilio';
    }

    public function makeCall(): Call
    {
        return new Call();
    }

    public function sendSms(string $number, string $body): Sms
    {
        $twilio = new Client($this->sid, $this->token);

        $sms = $twilio->messages->create(
            $number,
            [
                'from' => 'your_mobile_number',
                'body' => $body
            ]
        );

        return new Sms($number, $body);
    }
}
