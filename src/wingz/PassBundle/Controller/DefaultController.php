<?php

namespace wingz\PassBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('wingzPassBundle:Default:index.html.twig');
    }
}
