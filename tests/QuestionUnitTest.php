<?php

namespace App\Tests;

use App\Entity\Category;
use App\Entity\Question;
use PHPUnit\Framework\TestCase;

class QuestionUnitTest extends TestCase
{
    public function testIsTrue(): void
    {

        $question = new Question();
        $category = new Category();

        $question->setQuestion('bonjour')
        ->setAnswer('bonsoir')
        ->setCategory($category);

        $this->assertTrue($question->getQuestion()==='bonjour');
        $this->assertTrue($question->getAnswer()==='bonsoir');
        $this->assertTrue($question->getCategory()===$category);
    }

    public function testIsfalse()
    {
        $question = new Question();
        $category = new Category();

        $question->setQuestion('bonjour')
        ->setAnswer('bonsoir')
        ->setCategory($category);


        $this->assertFalse($question->getQuestion()==='bonjourno');
        $this->assertFalse($question->getAnswer()==='bonsoirno');
        $this->assertFalse($question->getCategory()=== new Category());

    }

    public function testIsEmpty()
    {
        $question = new Question();

        $this->assertEmpty($question->getQuestion());
        $this->assertEmpty($question->getAnswer());
        $this->assertEmpty($question->getCategory());
        $this->assertEmpty($question->getId());
    }
}
