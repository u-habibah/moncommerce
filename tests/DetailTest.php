<?php

namespace App\Tests;

use App\Entity\Detail;
use App\Entity\Order;
use PHPUnit\Framework\TestCase;

class DetailTest extends TestCase
{
    public function testIsTrue(): void
    {
        $detail = new Detail();
        $order = new Order();

        $detail->setProduct('product')
               ->setPrice(123)
               ->setQte(1)
               ->setTotal(123)
               ->setOrders($order);

        $this->assertTrue($detail->getProduct() === 'product');
        $this->assertTrue($detail->getPrice() == 123);
        $this->assertTrue($detail->getQte() == 1);
        $this->assertTrue($detail->getTotal() == 123);
        $this->assertTrue($detail->getOrders() === $order);
    }

    public function testIsFalse(): void
    {
        $detail = new Detail();
        $order = new Order();

        $detail->setProduct('product')
               ->setPrice(123)
               ->setQte(1)
               ->setTotal(123)
               ->setOrders($order);

        $this->assertFalse($detail->getProduct() === 'false');
        $this->assertFalse($detail->getPrice() == 12);
        $this->assertFalse($detail->getQte() == 12);
        $this->assertFalse($detail->getTotal() == 12);
        $this->assertFalse($detail->getOrders() === new Order());
    }

    public function testIsEmpty(): void
    {
        $detail = new Detail();

        $this->assertEmpty($detail->getProduct());
        $this->assertEmpty($detail->getPrice());
        $this->assertEmpty($detail->getQte());
        $this->assertEmpty($detail->getTotal());
        $this->assertEmpty($detail->getOrders());
    }
}
