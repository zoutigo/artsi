<?php

namespace App\Tests;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class ArticleUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $datetime = new DateTime();
        $user = new User();
        $comment = new Comment();
        $category = new Category();
        $article = new Article();

        $article->setTitle('titre');
        $article->setContent('contenu');
        $article->setSlug('slug');
        $article->setIsPublished(false);
        $article->setCreatedAt($datetime);
        $article->setUpdatedAt($datetime);
        $article->setAuthor($user);
        $article->addComment($comment);
        $article->addCategory($category);


        $this->assertTrue($article->getTitle() === 'titre');
        $this->assertTrue($article->getContent() === 'contenu');
        $this->assertTrue($article->getSlug() === 'slug');
        $this->assertTrue($article->getIsPublished() === false);
        $this->assertTrue($article->getCreatedAt() === $datetime);
        $this->assertTrue($article->getUpdatedAt() === $datetime);
        $this->assertTrue($article->getAuthor() === $user);
        $this->assertContains($category, $article->getCategories());
        $this->assertContains($comment, $article->getComments());
    }

    public function testIsFalse(): void
    {
        $datetime = new DateTime();
        $user = new User();
        $comment = new Comment();
        $category = new Category();
        $article = new Article();

        $article->setTitle('titre');
        $article->setContent('contenu');
        $article->setSlug('slug');
        $article->setIsPublished(false);
        $article->setCreatedAt($datetime);
        $article->setUpdatedAt($datetime);
        $article->setAuthor($user);
        $article->addCategory($category);
        $article->addComment($comment);

        $this->assertFalse($article->getTitle() === 'titres');
        $this->assertFalse($article->getContent() === 'contenus');
        $this->assertFalse($article->getSlug() === 'slugs');
        $this->assertFalse($article->getIsPublished() === true);
        $this->assertFalse($article->getCreatedAt() === new DateTime());
        $this->assertFalse($article->getUpdatedAt() === new DateTime());
        $this->assertFalse($article->getAuthor() === new User());
        $this->assertNotContains(new Category(), $article->getCategories());
        $this->assertNotContains(new Comment(), $article->getComments());
    }

    public function testIsEmpty(): void
    {
        $article = new Article();

        $this->assertEmpty($article->getTitle());
        $this->assertEmpty($article->getContent());
        $this->assertEmpty($article->getSlug());
        $this->assertEmpty($article->getIsPublished());
        $this->assertEmpty($article->getCreatedAt());
        $this->assertEmpty($article->getUpdatedAt());
        $this->assertEmpty($article->getCategories());
        $this->assertEmpty($article->getComments());
    }
}
