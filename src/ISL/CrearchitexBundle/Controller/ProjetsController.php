<?php

namespace ISL\CrearchitexBundle\Controller;

use ISL\CrearchitexBundle\Entity\Projet;
use ISL\CrearchitexBundle\Entity\Images;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjetsController extends Controller {

    /**
     * @Route("/projets", name="projets")
     */
    public function projetsAction() {
        return $this->render('ISLCrearchitexBundle:public:projets.html.twig');
    }

    /**
     * @Route("/projets/new", name="projets_new")
     */
    public function newAction() {
        $em = $this->getDoctrine()->getManager();

        $projet = new Projets;
        $image = new Images;
        $projet->setNom("essai");
        $projet->setDescription("une description");

        $image->setUrl("http://placekitten.com/220/220");
        $projet->setImage($image);
        $em->persist($projet);

        $em->flush();

        return $this->render('ISLCrearchitexBundle:public:projets.html.twig');
    }

    /**
     * @Route("/projets/list", name="projets_liste")
     */
    public function showAction() {

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('ISLCrearchitexBundle:Projet');
        $projets = new Projet();
        $projets = $repo->findAll();

        return $this->render('ISLCrearchitexBundle:public:projets-liste.html.twig', ["projets" => $projets]);
    }
    
    /**
     * @Route("/projets/{id}", name="projets_un")
     */
    public function showOneAction($id) {

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('ISLCrearchitexBundle:Projet');
        $projet = new Projet();
        $projet = $repo->find($id);

        return $this->render('ISLCrearchitexBundle:public:projet.html.twig', ["projet" => $projet]);
    }

}
