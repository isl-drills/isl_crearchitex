<?php

namespace ISL\CrearchitexBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use ISL\CrearchitexBundle\Entity\Image;
use ISL\CrearchitexBundle\Entity\Projet;
use ISL\CrearchitexBundle\Entity\Categorie;

class LoadProjets  extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $faker= Factory::create();
        $tab_url=array("http://placekitten.com/220/220","http://placekitten.com/221/221","http://placekitten.com/222/222");
        
        for ($i=0;$i<3;$i++){
            $projet[$i]=new Projet;
            $projet[$i]->setNom($faker->sentence($nbWords=1));
            $projet[$i]->setDescription($faker->sentence($nbWords=10));
            
            $image=new Image;
            $image->setUrl($tab_url[$i]);
            $image->setAlt($faker->sentence($nbWords=4));
            
            $projet[$i]->setImage($image);
            $categorie=$this->getReference('cat_'.$i);
            $projet[$i]->addCategorie($categorie);
            $manager->persist($projet[$i]);
            
        }
        
        $manager->flush();
        
    }
    
    public function getOrder() {
        return 2;
    }
}
