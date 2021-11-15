<?php

/*
1. Создать структуру классов ведения товарной номенклатуры.
-- Есть абстрактный товар;
-- Есть цифровой товар, штучный физический товар и товар на вес;
-- У каждого есть метод подсчета финальной стоимости;
-- У цифрового товара стоимость постоянная. У штучного товара стоимость зависит от количества штук, у весового – в зависимости от продаваемого количества в килограммах.
У всех формируется в конечном итоге доход с продаж.
Что можно вынести в абстрактный класс, наследование?
 */

abstract class Product
{
    protected static $summ = 0;
    protected $price = 0;
    abstract public function getPrice();
    abstract public function setPrice();
    abstract public function FinalPrice();
    abstract public function getRevenueSales();
}

class DigitalProduct extends Product
{
    protected $price = null;
    protected static $summPrice = null;

    public function __construct($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice()
    {
        $this->price = $price;
    }

    public function FinalPrice()
    {
        self::$summPrice += $this->price;
        self::$summ += $this->price;
        return $this->price;
    }

    public function getSumm()
    {
        return self::$summ;
    }

    public function getRevenueSales()
    {
        return self::$summPrice;
    }

}

class PiecePhysicalProduct extends Product
{
    protected $price = null;
    protected $count = null;
    protected static $summPrice = null;

    public function __construct($price, $count)
    {
        $this->count = $count;
        $this->price = $price;
    }

    public function FinalPrice()
    {
        $totalPrice = $this->count * $this->price;
        self::$summPrice += $totalPrice;
        self::$summ += $totalPrice;
        return $totalPrice;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice()
    {
        $this->price = $price;
    }

    public function setCount($count)
    {
        $this->count = $count;
    }

    public function getCount($count)
    {
        return $this->count;
    }

    public function getSumm()
    {
        return self::$summ;
    }

    public function getRevenueSales()
    {
        return self::$summPrice;
    }

}

class WeightProduct extends Product
{
    protected $weight = null;
    protected static $summPrice = null;

    public function __construct($price, $weight)
    {
        $this->price = $price;
        $this->weight = $weight;
    }

    public function FinalPrice()
    {
        $totalPrice = $this->weight * $this->price;
        self::$summPrice += $totalPrice;
        self::$summ += $totalPrice;
        return $totalPrice;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice()
    {
        $this->price = $price;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getWeight($weight)
    {
        return $this->weight;
    }

    public function getSumm()
    {
        return self::$summ;
    }

    public function getRevenueSales()
    {
        return self::$summPrice;
    }

}

$DigitalProduct = new DigitalProduct(10);
echo 'Продажа цифрового товара - ' . $DigitalProduct->FinalPrice() . '<br>';

$DigitalProduct1 = new DigitalProduct(6);
echo 'Продажа цифрового товара - ' . $DigitalProduct1->FinalPrice() . '<br>';
echo 'Доход с продаж цифрового товара - ' . $DigitalProduct1->getRevenueSales() . '<br>';

echo '<hr>';

$PiecePhysicalProduct = new PiecePhysicalProduct(5, 3);
echo 'Продажа штучного товара - ' . $PiecePhysicalProduct->FinalPrice() . '<br>';

$PiecePhysicalProduct1 = new PiecePhysicalProduct(5, 10);
echo 'Продажа штучного товара - ' . $PiecePhysicalProduct1->FinalPrice() . '<br>';

echo 'Доход с продаж цифрового товара - ' . $PiecePhysicalProduct1->getRevenueSales() . '<br>';

echo '<hr>';

$WeightProduct = new WeightProduct(12, 3.5);
echo 'Продажа весового товара - ' . $WeightProduct->FinalPrice() . '<br>';
$WeightProduct = new WeightProduct(12, 2.2);
echo 'Продажа весового товара - ' . $WeightProduct->FinalPrice() . '<br>';
$WeightProduct = new WeightProduct(12, 2.1);
echo 'Продажа весового товара - ' . $WeightProduct->FinalPrice() . '<br>';
$WeightProduct = new WeightProduct(12, 2.9);
echo 'Продажа весового товара - ' . $WeightProduct->FinalPrice() . '<br>';

echo 'Доход с продаж весового товара - ' . $WeightProduct->getRevenueSales() . '<br>';

echo '<hr>';

echo 'Общий доход с продаж - ' . $WeightProduct->getSumm() . '<br>';
