<?php

namespace App\Tests;

use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User();
        $article = new Article();
        $comment = new Comment();

        $user->setEmail('true@test.com');
        $user->setFirstname('prenom');
        $user->setLastname('nom');
        $user->setPassword('password');
        $user->setDescription('description');
        $user->setInstagram('instagram');
        $user->addArticle($article);
     

        $this->assertTrue($user->getEmail() === 'true@test.com');
        $this->assertTrue($user->getFirstname() === 'prenom');
        $this->assertTrue($user->getLastname() === 'nom');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getDescription() === 'description');
        $this->assertTrue($user->getInstagram() === 'instagram');
        $this->assertContains($article, $user->getArticles());
     
    }

    public function testIsFalse(): void
    {
        $user = new User();
        $article = new Article();
        $comment = new Comment();

        $user->setEmail('true@tester.com')
            ->setFirstname('prenomer')
            ->setLastname('nommer')
            ->setPassword('passworder')
            ->setDescription('descriptioner')
            ->setInstagram('instagramer')
            ->addArticle($article);
        

        $this->assertFalse($user->getEmail() === 'true@test.com');
        $this->assertFalse($user->getFirstname() === 'prenom');
        $this->assertFalse($user->getLastname() === 'nom');
        $this->assertFalse($user->getPassword() === 'password');
        $this->assertFalse($user->getDescription() === 'description');
        $this->assertFalse($user->getInstagram() === 'instagram');
        $this->assertNotContains(new Article(), $user->getArticles());
    }

    public function testIsEmpty()
    {
        $user = new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getFirstname());
        $this->assertEmpty($user->getLastname());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getDescription());
        $this->assertEmpty($user->getInstagram());
        $this->assertEmpty($user->getArticles());
    }
}
