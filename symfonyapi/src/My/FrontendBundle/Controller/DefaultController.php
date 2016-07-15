<?php

namespace My\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */

    public function indexAction()
    {


        return $this->render(
            'MyFrontendBundle:Default:index.html.twig'
        );
    }

    /**
     * @Route("/{id}")
     * @Template()
     */
    public function formAction($id)
    {


        return $this->render(
            'MyFrontendBundle:Default:index.html.twig', array('value' => $id)
        );


    }



    /**
     * @Route("/rule.html", name="url_rule")
     * @Template()
     */
    public function ruleAction()
    {
        return array();
    }
    /**
     * @Route("/all.html", name="url_all")
     * @Template()
     */
    public function allAction()
    {
        return array();
    }



}
