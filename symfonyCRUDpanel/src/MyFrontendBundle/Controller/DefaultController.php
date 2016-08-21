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
        $dql   = "SELECT a FROM MyFrontendBundle:Tasks a ORDER By a.posted DESC";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            4/*limit per page*/
        );

        // parameters to template
//        return $this->render('AcmeMainBundle:Article:list.html.twig', array('pagination' => $pagination));

        return $this->render('MyFrontendBundle:Default:index.html.twig', array('pagination' => $pagination));

    }

    /**
     * @Route("/history")
     */
    public function historyAction()
    {

        $em = $this->getDoctrine()->getManager();

        $stories = $em->getRepository('MyFrontendBundle:Story')->findAll();

        return $this->render('MyFrontendBundle:Default:history.html.twig', array(
            'stories' => $stories,
        ));


    }

//    /**
//     * @Route("/members")
//     */
//    public function membersAction()
//    {
//        return $this->render('MyFrontendBundle:Default:members.html.twig');
//    }

    /**
     * @Route("/con")
     */
    public function contactAction()
    {

        $em = $this->getDoctrine()->getManager();

        $contacts = $em->getRepository('MyFrontendBundle:Contact')->findAll();

        return $this->render('MyFrontendBundle:Default:contact.html.twig', array(
            'contacts' => $contacts,
        ));


    }

    /**
     * @Route("/gallery")
     */

    public function galleryAction(Request $request)
    {
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM MyFrontendBundle:Image a";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            16/*limit per page*/
        );

        // parameters to template
//        return $this->render('AcmeMainBundle:Article:list.html.twig', array('pagination' => $pagination));
        return $this->render('MyFrontendBundle:Default:gallery.html.twig', array('pagination' => $pagination));
    }



//    public function carouselAction()
//    {
//        return $this->render('MyFrontendBundle:Default:carousel.html.twig', array('test' => '2'));
//
//
//
//    }

    /**
     * @Route("/panel")
     */
    public function panelAction()
    {

//        return $this->render('MyFrontendBundle:Default:history.html.twig') +
        return $this->render('MyFrontendBundle:Default:panel.html.twig');
    }


    
    
    /**
     * @Route("/members")
     */
    public function membersAction(Request $request)
    {
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM MyFrontendBundle:Squad a";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            4/*limit per page*/
        );

        // parameters to template
//        return $this->render('AcmeMainBundle:Article:list.html.twig', array('pagination' => $pagination));

        return $this->render('MyFrontendBundle:Default:members.html.twig', array('pagination' => $pagination));

    }
}
