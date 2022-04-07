<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FaqFunctionalTest extends WebTestCase
{
    public function testDisplayFaqPage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/faq');

        $this->assertResponseIsSuccessful();
        // $this->assertSelectorTextContains('h1', 'Hello World');
    }
    public function testDisplayFaqCategory(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/faq/category-test');

        $this->assertResponseIsSuccessful();
        // $this->assertSelectorTextContains('h1', 'Hello World');
    }
}
