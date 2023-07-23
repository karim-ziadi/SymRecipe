<?php

namespace App\DataFixtures;

require_once 'vendor/autoload.php';


use Faker\Factory;
use App\Entity\Ingredient;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Generator;

class IngredientFixtures extends Fixture
{
    /**
     * @var Generator
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 50; $i++) {
            $ingredient = new Ingredient();
            $ingredient->setName($this->faker->name());
            $ingredient->setPrice(mt_rand(0, 100));
            $manager->persist($ingredient);
        }


        $manager->flush();
    }
}
