<?php

namespace App\Tests;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Question;
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
        $category->setImage('image.png');
        $category->addArticle($article);

        $this->assertTrue($category->getName() === 'name');
        $this->assertTrue($category->getDescription() === 'description');
        $this->assertTrue($category->getSlug() === 'slug');
        $this->assertTrue($category->getImage()==='image.png');
        $this->assertContains($article, $category->getArticles());
    }
    public function testIsFalse(): void
    {
        $article = new Article;
        $category = new Category();

        $category->setName('name');
        $category->setDescription('description');
        $category->setSlug('slug');
        $category->setImage('image.png');
        $category->addArticle($article);

        $this->assertFalse($category->getName() === 'names');
        $this->assertFalse($category->getDescription() === 'descriptions');
        $this->assertFalse($category->getSlug() === 'slugs');
        $this->assertFalse($category->getImage()==='picture.jpg');
        $this->assertNotContains(new Article(), $category->getArticles());
    }

    public function testIsEmpty(): void
    {
        $category = new Category();

        $this->assertEmpty($category->getName());
        $this->assertEmpty($category->getDescription());
        $this->assertEmpty($category->getSlug() === 'slugs');
        $this->assertEmpty($category->getArticles());
        $this->assertEmpty($category->getId());
    }

    public function testAddRemoveArticle()
    {
        $category = new Category();
        $article = new Article();

        $category->addArticle($article);
        $this->assertContains($article,$category->getArticles());

        $category->removeArticle($article);
        $this->assertNotContains($article,$category->getArticles());
    }

    public function testAddGetRemoveQuestion()
    {
        $category = new Category();
        $question = new Question();

        $category->addQuestion($question);
        $this->assertContains($question, $category->getQuestions());

        $category->removeQuestion($question);
        $this->assertNotContains($question,$category->getQuestions());
    }
}
