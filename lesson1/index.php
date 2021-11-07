<?php

/*
1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п.
2. Описать свойства класса из п.1 (состояние).
3. Описать поведение класса из п.1 (методы).
 */

class Product
{
    public $id;
    public $title;
    public $description;
    public $price;

    public function getProduct()
    {
        return array("title" => $this->title, "description" => $this->description, "price" => $this->$price);
    }

    public function getDiscount($percent = 0)
    {
        return $this->price - ($this->price * $percent / 100);
    }

    public function view()
    {
        echo "<div>$this->title</div><p>$this->price</p>";
    }

}
$product = new Product();
$product->id = 1;
$product->title = 'Lorem ipsum dolor';
$product->description = 'Quis a eos voluptates dicta natus illum. Vitae vero reprehenderit impedit eius at saepe alias qui consectetur labore possimus';
$product->price = 100;
$product->view();

echo $product->getDiscount(10);

echo '<hr>';




/*
4. Придумать наследников класса из п.1. Чем они будут отличаться?
 */

class VIPProduct extends Product
{
    public $quality;

    public function __construct($quality) {
        $this->quality = $quality;
        echo $this->quality;
    }

    public function getQuality()
    {
        return 'Качество - ' .$this->quality;
    }
}

$VIPProduct = new VIPProduct(10);
$VIPProduct->id = 1;
$VIPProduct->title = 'Lorem ipsum dolor';
$VIPProduct->description = 'Quis a eos voluptates dicta natus illum. Vitae vero reprehenderit impedit eius at saepe alias qui consectetur labore possimus';
$VIPProduct->price = 100;
$VIPProduct->view();

echo $VIPProduct->getQuality();

// Отличие: добавлено свойство качество и метод getQuality(), в остальном все методы и свойства унаследованы от Product

echo '<hr>';




/*
5. Дан код? Что он выведет на каждом шаге? Почему?
 */
class A
{
    public function foo()
    {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A(); // создание объекта из класса А
$a2 = new A(); // создание второго объекта из класса А
$a1->foo(); // 1 // вызываем метод foo у объекта, в не определяется переменная $x как статическая и приравнивается 0 (счетчик)
$a2->foo(); // 2 // при вызове метода foo у другого объекта, переменная $x уже не определятся
$a1->foo(); // 3 // динамические методы в PHP «не размножаются»
$a2->foo(); // 4 // и метод существует в одном экземпляре соответственно переменная  $x, продолжает увеличиваться на 1 при каждом вызове метода.

echo '<hr>';



/*6. Немного изменим п.5 Объясните результаты в этом случае. */

class AA
{
    public function foo()
    {
        static $x = 0;
        echo ++$x;
    }
}
class B extends AA
{
}
$a1 = new AA();
$b1 = new B();
$a1->foo(); // 1 // Как и в предыдущем задании, создаётся 2 объекта. Из класса АА, и класс В  наследуется из класса АА.
$b1->foo(); // 1
$a1->foo(); // 2 // наследование класса (и метода) приводит к тому, что в памяти создается новый метод, поэтому счетчик увеличивается
$b1->foo(); // 2 // отдельно для каждого объекта.

echo '<hr>';



/*
7.* Дан код, Что он выведет на каждом шаге? Почему? */

class AAA
{
    public function foo()
    {
        static $x = 0;
        echo ++$x;
    }
}
class BB extends AAA
{
}
$a1 = new AAA; // создание объекта из класса АAA
$b1 = new BB; // создание объекта из класса BB
$a1->foo(); // 1 // вызываем метод foo у объекта $a1, в методе foo определятся счетчик на основе статической переменой $x 
$b1->foo(); // 1 // вызываем метод foo у объекта $b1, в методе foo определятся счетчик на основе статической переменой $x, как и в предыдущем  задании при наследовании создается новый метод, поэтому счетчик будет свой для данного объекта
$a1->foo(); // 2 // вызываем метод foo у объекта $a1, счетчик при это увеличивается на 1
$b1->foo(); // 2 // вызываем метод foo у объекта $b1, счетчик при это увеличивается на 1
