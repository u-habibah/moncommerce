<?php

namespace App\Tests;

use App\Entity\Address;
use App\Entity\Order;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User();
        $address = new Address();
        $order = new Order();

        $user->setLastname('lastname')
             ->setFirstname('firstname')
             ->setEmail('true@email.com')
             ->setPassword('password')
             ->addAddress($address)
             ->addOrder($order);

        $this->assertTrue($user->getLastname() === 'lastname');
        $this->assertTrue($user->getFirstname() === 'firstname');
        $this->assertTrue($user->getEmail() === 'true@email.com');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertContains($address, $user->getAddresses());
        $this->assertContains($order, $user->getOrders());
    }

    public function testIsFalse(): void
    {
        $user = new User();
        $address = new Address();
        $order = new Order();

        $user->setLastname('lastname')
             ->setFirstname('firstname')
             ->setEmail('true@email.com')
             ->setPassword('password')
             ->addAddress($address)
             ->addOrder($order);

        $this->assertFalse($user->getLastname() === 'false');
        $this->assertFalse($user->getFirstname() === 'false');
        $this->assertFalse($user->getEmail() === 'false@email.com');
        $this->assertFalse($user->getPassword() === 'false');
        $this->assertNotContains(new Address(), $user->getAddresses());
        $this->assertNotContains(new Order(), $user->getOrders());
    }

    public function testIsEmpty(): void
    {
        $user = new User();

        $this->assertEmpty($user->getLastname());
        $this->assertEmpty($user->getFirstname());
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getAddresses());
        $this->assertEmpty($user->getOrders());
    }
}
