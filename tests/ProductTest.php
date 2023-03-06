<?php

namespace App\Tests;

use App\Entity\Category;
use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testIsTrue(): void
    {
        $product = new Product();
        $category = new Category();

        $product->setName('name')
                ->setCategory($category)
                ->setDescription('description')
                ->setImage('image')
                ->setIsBest(true)
                ->setIsPromo(true)
                ->setPrice(123)
                ->setSlug('slug');

        $this->assertTrue($product->getName() === 'name');
        $this->assertTrue($product->getCategory() === $category);
        $this->assertTrue($product->getDescription() === 'description');
        $this->assertTrue($product->getImage() === 'image');
        $this->assertTrue($product->isIsBest() === true);
        $this->assertTrue($product->isIsPromo() === true);
        $this->assertTrue($product->getPrice() == 123);
        $this->assertTrue($product->getSlug() === 'slug');
    }

    public function testIsFalse(): void
    {
        $product = new Product();
        $category = new Category();

        $product->setName('name')
                ->setCategory($category)
                ->setDescription('description')
                ->setImage('image')
                ->setIsBest(true)
                ->setIsPromo(true)
                ->setPrice(123)
                ->setSlug('slug');

        $this->assertFalse($product->getName() === 'false');
        $this->assertFalse($product->getCategory() === new Category());
        $this->assertFalse($product->getDescription() === 'false');
        $this->assertFalse($product->getImage() === 'false');
        $this->assertFalse($product->isIsBest() === false);
        $this->assertFalse($product->isIsPromo() === false);
        $this->assertFalse($product->getPrice() == 12);
        $this->assertFalse($product->getSlug() === 'false');
    }

    public function testIsEmpty(): void
    {
        $product = new Product();

        $this->assertEmpty($product->getName());
        $this->assertEmpty($product->getCategory());
        $this->assertEmpty($product->getDescription());
        $this->assertEmpty($product->getImage());
        $this->assertEmpty($product->isIsBest());
        $this->assertEmpty($product->isIsPromo());
        $this->assertEmpty($product->getPrice());
        $this->assertEmpty($product->getSlug());
    }
}
