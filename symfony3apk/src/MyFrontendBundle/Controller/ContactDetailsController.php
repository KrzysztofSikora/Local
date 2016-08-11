<?php

namespace MyFrontendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MyFrontendBundle\Entity\ContactDetails;
use MyFrontendBundle\Form\ContactDetailsType;
use MyFrontendBundle\Form\ContactDetailsType2;

/**
 * ContactDetails controller.
 *
 * @Route("/contactdetails")
 */
class ContactDetailsController extends Controller
{
    /**
     * Lists all ContactDetails entities.
     *
     * @Route("/", name="contactdetails_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contactDetails = $em->getRepository('MyFrontendBundle:ContactDetails')->findAll();
           
        return $this->render('contactdetails/index.html.twig', array(
            'contactDetails' => $contactDetails,
        ));
    }

    /**
     * Creates a new ContactDetails entity.
     *
     * @Route("/new", name="contactdetails_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $contactDetail = new ContactDetails();
        $form = $this->createForm('MyFrontendBundle\Form\ContactDetailsType', $contactDetail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contactDetail);
            $em->flush();

            return $this->redirectToRoute('contactdetails_show', array('id' => $contactDetail->getId()));
        }

        return $this->render('contactdetails/new.html.twig', array(
            'contactDetail' => $contactDetail,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ContactDetails entity.
     *
     * @Route("/{id}", name="contactdetails_show")
     * @Method("GET")
     */
    public function showAction(ContactDetails $contactDetail)
    {
        $deleteForm = $this->createDeleteForm($contactDetail);

        return $this->render('contactdetails/show.html.twig', array(
            'contactDetail' => $contactDetail,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ContactDetails entity.
     *
     * @Route("/{id}/edit", name="contactdetails_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ContactDetails $contactDetail)
    {
        $deleteForm = $this->createDeleteForm($contactDetail);
        $editForm = $this->createForm('MyFrontendBundle\Form\ContactDetailsType', $contactDetail);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contactDetail);
            $em->flush();

            return $this->redirectToRoute('contactdetails_edit', array('id' => $contactDetail->getId()));
        }

        return $this->render('contactdetails/edit.html.twig', array(
            'contactDetail' => $contactDetail,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ContactDetails entity.
     *
     * @Route("/{id}/cont", name="cont_edit")
     * @Method({"GET", "POST"})
     */
    public function contAction(Request $request, ContactDetails $contactDetail)
    {
        $deleteForm = $this->createDeleteForm($contactDetail);
        $editForm = $this->createForm('MyFrontendBundle\Form\ContactDetailsType2', $contactDetail);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contactDetail);
            $em->flush();

            return $this->redirectToRoute('cont_edit', array('id' => $contactDetail->getId()));
        }

        return $this->render('contactdetails/edit2.html.twig', array(
            'contactDetail' => $contactDetail,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ContactDetails entity.
     *
     * @Route("/{id}", name="contactdetails_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ContactDetails $contactDetail)
    {
        $form = $this->createDeleteForm($contactDetail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contactDetail);
            $em->flush();
        }

        return $this->redirectToRoute('contactdetails_index');
    }

    /**
     * Creates a form to delete a ContactDetails entity.
     *
     * @param ContactDetails $contactDetail The ContactDetails entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ContactDetails $contactDetail)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contactdetails_delete', array('id' => $contactDetail->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
