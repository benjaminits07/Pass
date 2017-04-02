<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LayoutController extends Controller
{

    public function menuAction($route)
    {
        $clients = $this->getDoctrine()->getRepository("AppBundle:Client")->findAll();

        return $this->render('layout/menu.html.twig', array(
            "route" => $route,
            "clients" => $clients
        ));
    }

}
