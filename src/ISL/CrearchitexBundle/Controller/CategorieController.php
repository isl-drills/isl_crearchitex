<?php

namespace ISL\CrearchitexBundle\Controller;

use ISL\CrearchitexBundle\Entity\Categorie;
use ISL\CrearchitexBundle\Form\CategorieType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategorieController extends Controller {

    /**
     * @Route("/admin/categorie/new", name="categories_ajout")
     */
    public function newAction(Request $request) {

        $categorie = new Categorie();
        $form = $this->createForm(CategorieType::class, $categorie);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            return $this->redirectToRoute("home");
        }

        return $this->render('ISLCrearchitexBundle:admin:categories_form_add.html.twig', array("form" => $form->createView(),));
    }

    /**
     * @Route("/admin/categorie/modify/{id}", name="categories_modifie")
     */
    public function modifyAction(Request $request, $id) {

        $categorie = new Categorie();
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('ISLCrearchitexBundle:Categorie');
        $categorie = $repo->find($id);

        $form = $this->createForm(CategorieType::class, $categorie);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            return $this->redirectToRoute("categories_show");
        }
        $deleteForm = $this->createDeleteForms($id);
        return $this->render('ISLCrearchitexBundle:admin:categories_form_modify.html.twig', array("form" => $form->createView(),
                    "deleteForm" => $deleteForm->createView()));
    }

    private function createDeleteForms($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('categories_delete', array("id" => $id)))
                        ->add('delete', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class, array('label' => 'supprime'))->getForm();
    }

    /**
     * @Route("/categories/show", name="categories_show")
     */
    public function showAction() {
        $doctrine = $this->getDoctrine()->getManager();
        $repo = $doctrine->getRepository('ISLCrearchitexBundle:Categorie');
        $categories = $repo->findAll();

        return $this->render('ISLCrearchitexBundle:admin:categories_view.html.twig', ["categories" => $categories]);
    }

    /**
     * @Route("/admin/categorie/delete/{id}", name="categories_delete")
     */
    public function deleteAction($id) {
        if ($id == null) {
            return $this->redirectToRoute('home');
        }
        $categorie = new Categorie;
        $repo = $this->getDoctrine()->getRepository('ISLCrearchitexBundle:Categorie');
        $categorie = $repo->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($categorie);
        $em->flush();

        return $this->redirectToRoute("home");
    }

}
