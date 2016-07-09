<?php

namespace My\Frontend6Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entities = $em->getRepository('MyFrontend6Bundle:File')->findAll();
        return array('entities' => $entities);
    }
    /**
     * Finds and displays a File entity.
     *
     * @Route("/download/{filename}", name="file_show")
     */
    public function showAction($filename)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entity = $em->getRepository('MyFrontend6Bundle:File')
            ->findOneByFilename($filename);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find File entity.');
        }
        $response = new Response();
        $response->setContent(base64_decode($entity->getContents()));
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', $entity->getMime());
        return $response;
    }
}
