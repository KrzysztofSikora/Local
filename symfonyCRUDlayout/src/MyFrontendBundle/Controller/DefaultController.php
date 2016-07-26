<?php

namespace MyFrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
//{
//    /**
//     * @Route("/")
//     */
//    public function indexAction()
//    {
//        return $this->render('MyFrontendBundle:Default:index.html.twig');
//    }
//}
    {
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM MyFrontendBundle:Tasks a";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        // parameters to template
//        return $this->render('AcmeMainBundle:Article:list.html.twig', array('pagination' => $pagination));
        return $this->render('MyFrontendBundle:Default:index.html.twig', array('pagination' => $pagination));
    }
}
