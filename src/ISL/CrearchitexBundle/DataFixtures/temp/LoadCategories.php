<?php

namespace ISL\CrearchitexBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ISL\CrearchitexBundle\Entity\Categories;

class LoadCategories implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
       //$em=$this->getDoctrine()->getManager();
    
        $datas=array(0=>array(
                        "nom"=>"Construction",
                        "descritpion"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi faucibus ac sapien nec pellentesque. Nulla facilisi. Praesent ut urna a massa ultricies sagittis. Pellentesque feugiat justo in dapibus hendrerit.",
                            ),
                     1=>array(
                        "nom"=>"Renovation",
                        "descritpion"=>"Donec posuere nibh ligula, et iaculis odio lacinia sit amet. Mauris quis magna felis.",
                            ),
                     2=>array(
                        "nom"=>"Interieur",
                        "descritpion"=>"urabitur auctor hendrerit nisi in dictum. Curabitur turpis sem, vestibulum ut auctor et, aliquam eget lorem. Nam blandit quam eget sapien ornare, sit amet egestas orci ullamcorper.",
                            )
            );
        
       
        for ($i=0;$i<3;$i++){
            $categories[$i]=new Categories;
            $categories[$i]->setNom($datas[$i]['nom']);
            $categories[$i]->setDescription($datas[$i]['descritpion']);
            $manager->persist($categories[$i]);
        }
        
        $manager->flush();
        
    }
}
