<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginFunctionalTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        $this->assertResponseIsSuccessful();
        // $this->assertSelectorTextContains('h1', 'Hello World');
    }

    public function testVisitingWhileLoggedIn():void
    {
        $client = static::createClient();
        $crawler = $client->request('GET','/login');

        $buttonCrawlerNode = $crawler->selectButton('Se Connecter');
        $form = $buttonCrawlerNode->form();

        $form = $buttonCrawlerNode->form([
            'email'=>'user@test.com',
            'password'=>'password'
        ]);

        $client->submit($form);

        $crawler = $client->request('GET','/login');
        $this->assertResponseIsSuccessful();
        // $this->assertSelectorTextContains('div','you are logged as user@test.com');
    }
}
