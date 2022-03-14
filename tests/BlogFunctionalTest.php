<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BlogFunctionalTest extends WebTestCase
{
    public function testShouldDisplayBlog(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/blog');

        $this->assertResponseIsSuccessful();
        // $this->assertSelectorTextContains('h5', 'Categories');
        // $this->assertSelectorTextContains('h5','Rechercher un article');
    }
    public function testShouldDisplayArticle(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/blog/article-test');
        // $crawler = $client->request('GET', '/blog/nobis-aut-animi-nulla');

        $this->assertResponseIsSuccessful();
        // $this->assertSelectorTextContains('a', 'Article test');
    }
}
