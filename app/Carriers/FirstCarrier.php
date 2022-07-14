<?php

namespace App\Carriers;

use App\Call;
use App\Contact;
use App\Interfaces\CarrierInterface;

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
}
