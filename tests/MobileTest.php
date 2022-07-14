<?php

namespace Tests;

use Mockery as m;
use PHPUnit\Framework\TestCase;

use App\Mobile;
use App\Carriers\FirstCarrier;

class MobileTest extends TestCase
{
	/** @test */
	public function it_returns_null_when_name_empty()
	{
		$provider = new FirstCarrier();

		$mobile = new Mobile($provider);

		$this->assertNull($mobile->makeCallByName(''));
	}
}
