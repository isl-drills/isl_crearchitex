<?php

namespace ISL\CrearchitexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class NewsController extends Controller
{
    /**
     * @Route("/news", name="news")
     */
    public function newsAction()
    {
        return $this->render('ISLCrearchitexBundle:public:news.html.twig');
    }
}
