<?php

namespace ISL\CrearchitexBundle\Controller;

use ISL\CrearchitexBundle\Entity\Projets;
use ISL\CrearchitexBundle\Entity\Images;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjetsController extends Controller
{
    /**
     * @Route("/projets", name="projets")
     */
    public function projetsAction()
    {
        return $this->render('ISLCrearchitexBundle:public:projets.html.twig');
    }
    
    /**
     * @Route("/projets/new", name="projets_new")
     */
    public function newAction()
    {
        $em=$this->getDoctrine()->getManager();
        
        $projet=new Projets;
        $image=new Images;
        $projet->setNom("essai");
        $projet->setDescription("une description");
        
        $image->setUrl("http://placekitten.com/220/220");
        $projet->setImage($image);
        $em->persist($projet);
        
        $em->flush();
        
        return $this->render('ISLCrearchitexBundle:public:projets.html.twig');
    }
}
