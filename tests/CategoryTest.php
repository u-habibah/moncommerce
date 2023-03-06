<?php

namespace App\Tests;

use App\Entity\Category;
use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    public function testIsTrue(): void
    {
        $category = new Category();
        $product = new Product();

        $category->setName('name')
                 ->addProduct($product);

        $this->assertTrue($category->getName() === 'name');
        $this->assertContains($product, $category->getProducts());
    }

    public function testIsFalse(): void
    {
        $category = new Category();
        $product = new Product();

        $category->setName('name')
                 ->addProduct($product);

        $this->assertFalse($category->getName() === 'false');
        $this->assertNotContains(new Product(), $category->getProducts());
    }

    public function testIsEmpty(): void
    {
        $category = new Category();

        $this->assertEmpty($category->getName());
        $this->assertEmpty($category->getProducts());
    }
}
