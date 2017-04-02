<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/{id}-{slug}", requirements={"id" = "\d+"}, name="show_password")
     */
    public function showPasswordByCustomersAction($id, $slug)
    {
        $em = $this->getDoctrine()->getManager();

        $clients = $em->getRepository('AppBundle:Client')->findOneBy(array(
            'id' => $id,
            'slug' => $slug
            ));

        $listPassword = $em->getRepository('AppBundle:Password')->findBy(array('client' => $clients));

        return $this->render('pass/show_password.html.twig', array(
          'clients'      => $clients,
          'listPassword' => $listPassword
        ));
    }
}
