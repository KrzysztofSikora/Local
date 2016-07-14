<?php

namespace My\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use My\FrontendBundle\Entity\Aktor;
use My\FrontendBundle\Entity\Film;



class AktorController extends Controller
{
    /**
     * Lista wszystkich filmow
     *
     * @Route("/aktorzy.html", name="aktor_index")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entities = $em->getRepository('MyFrontendBundle:Aktor')->findAll();
        return array('entities' => $entities);
    }
}
