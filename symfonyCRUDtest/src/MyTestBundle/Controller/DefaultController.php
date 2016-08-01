<?php

namespace MyTestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {



            return $this->render('MyTestBundle:Default:index.html.twig');




    }
    /**
     * @Route("/upload")
     */
    public function uploadAction(Request $request)
    {
        if($request->getMethod() == 'POST') {
//            $image = $request->query ->get('owner');
            $owner = $request->request ->get('owner');
            $description = $request->request ->get('description');
            $image = $request->files ->get('myimage');
//            $image = $request->files ->all();
//           print_r($image);
//            $imagee = file_get_contents($image);

            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $name = (basename($image));
            $mimeType = (finfo_file($finfo, $image));
            $binary = (base64_encode(file_get_contents($image)));
            finfo_close($finfo);



            return $this->render('MyTestBundle:Default:upload.html.twig', array ('owner' => $owner,
                'description' => $description, 'name'=> $name, 'mimeType' => $mimeType,'binary' => $binary));
//            $response = new Response(
//                'Content',
//                Response::HTTP_OK,
//                array('content-type' => 'text/html')
//
//            );

//            return $response;
        }

        else {
//            return $this->render('MyTestBundle:Default:upload.html.twig');
        }


    }
}
