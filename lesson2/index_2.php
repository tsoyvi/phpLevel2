<?php

/*
2. *Реализовать паттерн Singleton при помощи traits.


class Singleton
{
private static $instance;  // Экземпляр объекта

// Защищаем от создания через new Singleton
private function __construct()
{ // ... @return Singleton
}

// Защищаем от создания через клонирование
private function __clone()
{ // ... @return Singleton
}

// Защищаем от создания через unserialize
private function __wakeup()
{ // ... @return Singleton
}

// Возвращает единственный экземпляр класса. @return Singleton
public static function getInstance()
{
if (empty(self::$instance)) {
self::$instance = new self();
}

return self::$instance;
}

public function doAction()
{
echo 'test Singleton';
}
}
// Применение
Singleton::getInstance()->doAction();
 */



trait SingletonToTrait
{
    final private function __construct()
    {
    }

    final protected function __clone()
    {
    }

    final protected function __wakeup()
    {
    }

    public static function getInstance()
    {
        static $instance = null;
        if (!$instance) {
            $instance = new self;
        }
        return $instance;
    }
}

class AnalogSingleton
{
    use SingletonToTrait;

    public function doAction()
    {
        echo 'test AnalogSingleton';
    }
}

AnalogSingleton::getInstance()->doAction();
