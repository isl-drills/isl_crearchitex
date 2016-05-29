<?php

namespace ISL\CrearchitexBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Faker\DefaultGenerator;

use Doctrine\Common\Persistence\ObjectManager;
use ISL\CrearchitexBundle\Entity\Categorie;

class LoadCategories  extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $faker= \Faker\Factory::create();
        
        for ($i=0;$i<3;$i++){
            $categorie[$i]=new Categorie;
            $categorie[$i]->setNom($faker->sentence($nbWords=2));
            $categorie[$i]->setDescription($faker->text);
            $this->setReference('cat_'.$i,$categorie[$i]);
            $manager->persist($categorie[$i]);
            
        }
        
        $manager->flush();
        
    }
    
    public function getOrder() {
        return 1;
    }
}
