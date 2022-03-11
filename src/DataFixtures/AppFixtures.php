<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Question;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $encoder ;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder ;
    }
    public function load(ObjectManager $manager): void
    {

        // Utilisation de faker
        $faker = Factory::create('fr_FR');

        // Creation User

        $user = new User();

        $user->setEmail('user@test.com')
             ->setFirstname($faker->firstname)
             ->setLastname($faker->lastname)
             ->setDescription($faker->text())
             ->setInstagram('instagram')
             ->setRoles(['ROLE_MANAGER']);

        $password = $this->encoder->hashPassword($user,'password');
        $user->setPassword($password);

        $manager->persist($user);
    

        //Creation de 5 Categories
        for ($k=0;$k<5;$k++){
            $category = new Category();
            $category->setName($faker->word())
                     ->setDescription($faker->words(10,true))
                     ->setSlug($faker->slug())
                     ->setImage('/images/category.jpg') ;
            
            $manager->persist($category);

            for($j=0;$j<5;$j++){
                $article = new Article();
                $article->setTitle($faker->words(3,true))
                        ->setContent($faker->text(350))
                        ->setSlug($faker->slug(3))
                        ->setAuthor($user)
                        ->setIsPublished(true)
                        ->setReadtime(rand(3,15))
                        ->setUpdatedAt($faker->dateTimeBetween('-1 month','now'))
                        ->setCreatedAt($faker->dateTimeBetween('-6 month','now'))
                        ->addCategory($category);

                $manager->persist($article);
            }

            for($j=0; $j<5; $j++){
                $question = new Question();
                $question->setQuestion($faker->text(150))
                ->setAnswer($faker->text(300))
                ->setCategory($category);
                
                $manager->persist($question);
            }
        }
        $manager->flush();
    }
}
