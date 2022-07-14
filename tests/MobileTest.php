<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\Call;
use App\Mobile;
use App\Carriers\FirstCarrier;
use App\Interfaces\CarrierInterface;

class MobileTest extends TestCase
{
	private CarrierInterface $provider;
	private Mobile $mobile;

	public function setUp(): void
	{
		parent::setUp();

		$this->provider = $this->getMockBuilder(FirstCarrier::class)->getMock();
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
}
