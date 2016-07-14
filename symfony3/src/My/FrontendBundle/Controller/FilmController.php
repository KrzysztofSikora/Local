<?php

namespace My\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use My\FrontendBundle\Entity\Aktor;
use My\FrontendBundle\Entity\Film;

class FilmController extends Controller
{
    /**
     * Lista wszystkich filmow
     *
     * @Route("/filmy.html", name="film_index")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entities = $em->getRepository('MyFrontendBundle:Film')->findAll();
        return array('entities' => $entities);
    }
}
