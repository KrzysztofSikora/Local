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
    /**
     * Szczegolowe dane aktora
     *
     * @Route("/aktor/{id}.html", name="aktor_show")
     * @Template()
     */
    
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entity = $em->getRepository('MyFrontendBundle:Aktor')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Brak aktora o podanym id!');
        }
        return array('entity' => $entity);
    }
}
