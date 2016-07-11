<?php

namespace My\Frontend2Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use My\Frontend2Bundle\Entity\Kontynent;

class KontynentController extends Controller
{
    /**
     * @Route("/kontynenty.html", name="kontynent_index")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entities = $em->getRepository('MyFrontend2Bundle:Kontynent')->findAll();
//        $entitie = $em->getRepository('MyFrontend2Bundle:Panstwo')->findAll();
        return array('entities' => $entities);
    }
}
