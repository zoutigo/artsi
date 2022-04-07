<?php

namespace App\Tests;

use App\Entity\Contact;
use DateTime;
use PHPUnit\Framework\TestCase;

class ContactUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $contact = new Contact();
        $datetime = new DateTime();

        $contact->setName('robert')
        ->setEmail('test@test.com')
        ->setMessage('hello')
        ->setIsSent(false)
        ->setCreatedAt($datetime);

        $this->assertTrue($contact->getName()==='robert');
        $this->assertTrue($contact->getEmail()==='test@test.com');
        $this->assertTrue($contact->getMessage()==='hello');
        $this->assertTrue($contact->getIsSent()=== false);
        $this->assertTrue($contact->getCreatedAt()=== $datetime);

    }

    public function testIsFalse()
    {
        $contact = new Contact();
        $datetime = new DateTime();

        $contact->setName('robert')
        ->setEmail('test@test.com')
        ->setMessage('hello')
        ->setIsSent(false)
        ->setCreatedAt($datetime);


        $this->assertFalse($contact->getName()==='roberta');
        $this->assertFalse($contact->getEmail()==='testa@test.com');
        $this->assertFalse($contact->getMessage()==='hello mama');
        $this->assertFalse($contact->getIsSent()=== true);
        $this->assertFalse($contact->getCreatedAt()=== new DateTime());

    }

    public function testIsEmpty()   
    {
        $contact = new Contact();

        $this->assertEmpty($contact->getName());
        $this->assertEmpty($contact->getEmail());
        $this->assertEmpty($contact->getMessage());
        $this->assertEmpty($contact->getIsSent());
        $this->assertEmpty($contact->getCreatedAt());
        $this->assertEmpty($contact->getId());
    }
}
