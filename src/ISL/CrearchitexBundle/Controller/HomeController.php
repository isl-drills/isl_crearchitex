<?php

namespace ISL\CrearchitexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        $doctrine=$this->getDoctrine()->getManager();
        $repo=$doctrine->getRepository('ISLCrearchitexBundle:Categorie');
        $categories=$repo->findBy([],[],3);
        $repo=$doctrine->getRepository('ISLCrearchitexBundle:Projet');
        $projets=$repo->findBy([],[],3);
                 
        return $this->render('ISLCrearchitexBundle:public:index.html.twig',
                            ["categories"=>$categories, "projets"=>$projets]);
    }
}
