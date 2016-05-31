<?php

namespace ISL\CrearchitexBundle\Controller;

use ISL\CrearchitexBundle\Entity\Projet;
use ISL\CrearchitexBundle\Form\ProjetType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProjetsController extends Controller {

    /**
     * @Route("/projets", name="projets")
     */
    public function projetsAction() {
        return $this->render('ISLCrearchitexBundle:public:projets.html.twig');
    }

    /**
     * @Route("/admin/projets/new", name="projets_new")
     */
    public function newAction(Request $request) {

        $projet = new projet();
        $form = $this->createForm(ProjetType::class, $projet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($projet);
            $manager->flush();
            return $this->redirectToRoute("projets_liste");
        }
        return $this->render('ISLCrearchitexBundle:admin:projets_form_add.html.twig', ["form" => $form->createView()]);
    }

    /**
     * @Route("/admin/projets/modify/{id}", name="projets_modify")
     */
    public function modifyAction(Request $request, $id) {
        $projet = new projet();
        $manager = $this->getDoctrine()->getManager();
        $repo = $manager->getRepository('ISLCrearchitexBundle:projet');
        $projet = $repo->find($id);

        $form = $this->createForm(ProjetType::class, $projet);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($projet);
            $manager->flush();
            return $this->redirectToRoute("projets_liste");
        }
        $deleteForm = $this->createDeleteForms($id);
        return $this->render('ISLCrearchitexBundle:admin:projets_form_modify.html.twig', ["form" => $form->createView(),
            "deleteForm" => $deleteForm->createView()]);
    }
    
    private function createDeleteForms($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('categories_delete', array("id" => $id)))
                        ->add('delete', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class, array('label' => 'supprime'))->getForm();
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
