<?php

namespace My\Frontend5Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * Homepage
     *
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    /**
     * Finds and displays a Tren entity.
     *
     * @Route("/{slug}.html", name="tren_show")
     * @Template()
     */
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entity = $em->getRepository('MyFrontend5Bundle:Treny')->findOneBySlug($slug);
        if (!$entity) {
            throw $this->createNotFoundException('Podana strona nie istnieje!');
        }
        return array('entity' => $entity);
    }
    /**
     * Lists all Tren entities as ul/li/a menu.
     *
     * @Template()
     */
    public function menuAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entities = $em->getRepository('MyFrontend5Bundle:Treny')->findAll();
        return array('entities' => $entities);
    }
}
