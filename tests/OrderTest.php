<?php

namespace App\Tests;

use App\Entity\Detail;
use App\Entity\Order;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testIsTrue(): void
    {
        $order = new Order();
        $detail = new Detail();
        $user = new User();
        $date = new \DateTime();

        $order->setReference('reference')
              ->setAddress('address')
              ->setCarrierName('name')
              ->setCarrierPrice(123)
              ->setCreatedAt($date)
              ->setState(1)
              ->setStripe('stripe')
              ->setUser($user)
              ->addDetail($detail);

        $this->assertTrue($order->getReference() === 'reference');
        $this->assertTrue($order->getAddress() === 'address');
        $this->assertTrue($order->getCarrierName() === 'name');
        $this->assertTrue($order->getCarrierPrice() == 123);
        $this->assertTrue($order->getCreatedAt() === $date);
        $this->assertTrue($order->getState() == 1);
        $this->assertTrue($order->getStripe() === 'stripe');
        $this->assertTrue($order->getUser() === $user);
        $this->assertContains($detail, $order->getDetails());
    }

    public function testIsFalse(): void
    {
        $order = new Order();
        $detail = new Detail();
        $user = new User();
        $date = new \DateTime();

        $order->setReference('reference')
              ->setAddress('address')
              ->setCarrierName('name')
              ->setCarrierPrice(123)
              ->setCreatedAt($date)
              ->setState(1)
              ->setStripe('stripe')
              ->setUser($user)
              ->addDetail($detail);

        $this->assertFalse($order->getReference() === 'false');
        $this->assertFalse($order->getAddress() === 'false');
        $this->assertFalse($order->getCarrierName() === 'false');
        $this->assertFalse($order->getCarrierPrice() == 12);
        $this->assertFalse($order->getCreatedAt() === new \DateTime());
        $this->assertFalse($order->getState() == 12);
        $this->assertFalse($order->getStripe() === 'false');
        $this->assertFalse($order->getUser() === new User());
        $this->assertNotContains(new Detail(), $order->getDetails());
    }

    public function testIsEmpty(): void
    {
        $order = new Order();

        $this->assertEmpty($order->getReference());
        $this->assertEmpty($order->getAddress());
        $this->assertEmpty($order->getCarrierName());
        $this->assertEmpty($order->getCarrierPrice());
        $this->assertEmpty($order->getCreatedAt());
        $this->assertEmpty($order->getState());
        $this->assertEmpty($order->getStripe());
        $this->assertEmpty($order->getUser());
        $this->assertEmpty($order->getDetails());
    }
}
