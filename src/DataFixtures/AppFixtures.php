<?php

namespace App\DataFixtures;

use App\Entity\CustomDriver;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class AppFixtures extends Fixture
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
            $customDriver = new CustomDriver();
            $customDriver->setName($this->faker->userName())
                ->setHeight(mt_rand(161, 186))
                ->setWeight(mt_rand(50, 80));

            $manager->persist($customDriver);
        }

        $manager->flush();
    }
}
