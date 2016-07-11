<?php

namespace My\Frontend2Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use My\Frontend2Bundle\Entity\Panstwo;

class PanstwoController extends Controller
{
    /**
     * Lista wszystkich panstw
     *
     * @Route("/panstwa.html", name="panstwo_index")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entities = $em->getRepository('MyFrontend2Bundle:Panstwo')->findAll();
        return array('entities' => $entities);
    }
}
