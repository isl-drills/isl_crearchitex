<?php

namespace ISL\CrearchitexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProjetsController extends Controller
{
    /**
     * @Route("/projets", name="projets")
     */
    public function projetsAction()
    {
        return $this->render('ISLCrearchitexBundle::projets.html.twig');
    }
}
