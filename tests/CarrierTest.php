<?php

namespace App\Tests;

use App\Entity\Carrier;
use PHPUnit\Framework\TestCase;

class CarrierTest extends TestCase
{
    public function testIsTrue(): void
    {
        $carrier = new Carrier();

        $carrier->setName('name')
                ->setPrice(123);

        $this->assertTrue($carrier->getName() === 'name');
        $this->assertTrue($carrier->getPrice() == 123);
    }

    public function testIsFalse(): void
    {
        $carrier = new Carrier();

        $carrier->setName('name')
                ->setPrice(123);

        $this->assertFalse($carrier->getName() === 'false');
        $this->assertFalse($carrier->getPrice() == 1234);
    }

    public function testIsEmpty(): void
    {
        $carrier = new Carrier();

        $this->assertEmpty($carrier->getName());
        $this->assertEmpty($carrier->getPrice());
    }
}
