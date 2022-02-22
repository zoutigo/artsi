<?php

namespace App\Tests;

use App\Entity\Article;
use App\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $article = new Article;
        $category = new Category();

        $category->setName('name');
        $category->setDescription('description');
        $category->setSlug('slug');
        $category->addArticle($article);

        $this->assertTrue($category->getName() === 'name');
        $this->assertTrue($category->getDescription() === 'description');
        $this->assertTrue($category->getSlug() === 'slug');
        $this->assertContains($article, $category->getArticles());
    }
    public function testIsFalse(): void
    {
        $article = new Article;
        $category = new Category();

        $category->setName('name');
        $category->setDescription('description');
        $category->setSlug('slug');
        $category->addArticle($article);

        $this->assertFalse($category->getName() === 'names');
        $this->assertFalse($category->getDescription() === 'descriptions');
        $this->assertFalse($category->getSlug() === 'slugs');
        $this->assertNotContains(new Article(), $category->getArticles());
    }

    public function testIsEmpty(): void
    {
        $category = new Category();

        $this->assertEmpty($category->getName());
        $this->assertEmpty($category->getDescription());
        $this->assertEmpty($category->getSlug() === 'slugs');
        $this->assertEmpty($category->getArticles());
    }
}
