<?php

namespace App\Tests;

use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class CommentUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $article = new Article();
        $user = new User();
        $comment = new Comment();
        $datetime = new DateTime();

        $comment->setContent('content');
        $comment->setCreatedAt($datetime);
        $comment->setAuthor($user);
        $comment->setArticle($article);

        $this->assertTrue($comment->getContent() === 'content');
        $this->assertTrue($comment->getCreatedAt() === $datetime);
        $this->assertTrue($comment->getArticle() === $article);
        $this->assertTrue($comment->getAuthor() === $user);
    }

    public function testIsFalse(): void
    {
        $article = new Article();
        $user = new User();
        $comment = new Comment();
        $datetime = new DateTime();

        $comment->setContent('contents');
        $comment->setCreatedAt($datetime);
        $comment->setAuthor($user);
        $comment->setArticle($article);

        $this->assertFalse($comment->getContent() === 'content');
        $this->assertFalse($comment->getCreatedAt() === new DateTime());
        $this->assertFalse($comment->getArticle() === new Article());
        $this->assertFalse($comment->getAuthor() === new User());
    }
    public function testIsEmpty(): void
    {

        $comment = new Comment();

        $this->assertEmpty($comment->getContent());
        $this->assertEmpty($comment->getCreatedAt());
        $this->assertEmpty($comment->getArticle());
        $this->assertEmpty($comment->getAuthor());
    }
}
