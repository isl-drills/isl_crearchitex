<?php

namespace ISL\CrearchitexBundle\Controller;

use ISL\CrearchitexBundle\Entity\Categorie;
use ISL\CrearchitexBundle\Form\CategorieType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategorieController extends Controller
{
    /**
     * @Route("/admin/categorie/new", name="categories_ajout")
     */
    public function newAction()
    {

        $categorie=new Categorie();
        $form=  $this->createForm(CategorieType::class,$categorie);
        
        return $this->render('ISLCrearchitexBundle:admin:categories_form_add.html.twig',array("form"=>$form->createView(),));
    }
    
    /**
     * @Route("/categories/show", name="categories_show")
     */
    public function showAction(){
        $doctrine=$this->getDoctrine()->getManager();
        $repo=$doctrine->getRepository('ISLCrearchitexBundle:Categories');
        $categories=$repo->findAll();
        
        return $this->render('ISLCrearchitexBundle:admin:categories_view.html.twig',["categories"=>$categories]);
    }
}
