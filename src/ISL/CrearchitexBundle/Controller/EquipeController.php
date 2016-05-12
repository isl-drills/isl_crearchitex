<?php

namespace ISL\CrearchitexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class EquipeController extends Controller
{
    /**
     * @Route("/equipe", name="equipe")
     */
    public function equipeAction()
    {
        return $this->render('ISLCrearchitexBundle:public:equipe.html.twig');
    }
}
