<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeFunctionalTest extends WebTestCase
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function testShouldDisplayHomePage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'spécialité Suivi handicap');
        $this->assertSelectorTextContains('h3', 'Features');
        $this->assertSelectorTextContains('h2', 'Innovative business');
    }
}
