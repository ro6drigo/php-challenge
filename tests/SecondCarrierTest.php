<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\Call;
use App\Mobile;
use App\Sms;

use App\Carriers\SecondCarrier;
use App\Interfaces\CarrierInterface;

use Exception;

class SecondCarrierTest extends TestCase
{
    private CarrierInterface $provider;
    private Mobile $mobile;

    public function setUp(): void
    {
        parent::setUp();

        $this->provider = $this->getMockBuilder(SecondCarrier::class)->getMock();
        $this->mobile = new Mobile($this->provider);
    }

    /** @test */
    public function it_returns_null_when_name_empty()
    {
        $this->assertNull($this->mobile->makeCallByName(''));
    }

    /** @test */
    public function it_returns_call_object_when_name_valid()
    {
        $this->provider->expects($this->once())->method('makeCall')->willReturn(new Call());

        $this->assertInstanceOf(Call::class, $this->mobile->makeCallByName('Rodrigo'));
    }

    /** @test */
    public function it_throw_exception_when_contact_not_found()
    {
        $this->expectException(Exception::class);

        $this->mobile->makeCallByName('Victoria');
    }

    /** @test */
    public function test_send_sms_with_valid_phone()
    {
        $phone = '123 456 789';
        $body = 'body';

        $this->provider->expects($this->once())->method('sendSms')->willReturn(new Sms($phone, $body));

        $this->assertInstanceOf(Sms::class, $this->mobile->sendSms($phone, $body));
    }

    /** @test */
    public function test_send_sms_with_invalid_phone()
    {
        $this->expectException(Exception::class);

        $this->mobile->sendSms('invalid phone', 'body');
    }
}
