<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductTest extends WebTestCase
{
    public function testLogin()
    {
        $client = static::createClient();
        $client->request('GET', '/login');

        $this->assertPageTitleSame('Log in!');
        $this->assertCheckboxChecked('_remember_me');
        $this->assertInputValueSame('password', '');
        $this->assertInputValueSame('email', '');
    }

    public function testMainPage()
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertPageTitleSame('Hello MainPage!');
    }
}
