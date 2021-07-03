<?php

use PHPUnit\Framework\TestCase;
use app\models\entities\Product;

class ProductTest extends TestCase
{
    //...........Проверка конструктора и сетера.....................

    public function testProductConstructorAndSeter() {
        $name = '@s2%SDdasassss';
        $product = new Product($name);
        $this->assertEquals($name, $product->name);
    }

    //............Проверяет что props это массив........

    public function testProductPropsIsArray() {
        $product = new Product();
        $props = $product->props;
        $this->assertIsArray($props);
    }

    //............Проверяет есть ли такой ключ в массиве props........

    public function testProductProps() {
        $product = new Product();
        $props = $product->props;
        $this->assertArrayHasKey('description', $props);
    }

    //............Проверяет namespace без setUP() ..................................

    public function testProductNamespace() {
        $product = Product::class; // Если без setUp()
        $productExplode = explode("\\", $product); // app\models\\entities\Product   || Если без setUp()
        $product1 = $productExplode[0]; // app
        $product2 = $productExplode[1]; // models
        $product3 = $productExplode[2]; // entities
        $product4 = $productExplode[3]; // Product
        $this->assertEquals($product, "app\models\\entities\Product");
        $this->assertEquals($product1, "app");
        $this->assertEquals($product2, "models");
        $this->assertEquals($product3, "entities");
        $this->assertEquals($product4, "Product");
    }

    //............Проверяет namespace c setUp ......................................

    protected $testClass;

    protected function setUp(): void
    {
        $this->testClass = Product::class;
    }

    public function testProductNamespaceSetUp() {
        $productExplode = explode("\\", $this->testClass);
        $product1 = $productExplode[0]; // app
        $product2 = $productExplode[1]; // models
        $product3 = $productExplode[2]; // entities
        $product4 = $productExplode[3]; // Product
        $this->assertEquals($this->testClass, "app\models\\entities\Product");
        $this->assertEquals($product1, "app");
        $this->assertEquals($product2, "models");
        $this->assertEquals($product3, "entities");
        $this->assertEquals($product4, "Product");
    }

}