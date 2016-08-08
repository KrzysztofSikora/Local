<?php

namespace MyFrontendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MyFrontendBundle\Entity\FieldTypes;
use MyFrontendBundle\Form\FieldTypesType;

/**
 * FieldTypes controller.
 *
 * @Route("/fieldtypes")
 */
class FieldTypesController extends Controller
{
    /**
     * Lists all FieldTypes entities.
     *
     * @Route("/", name="fieldtypes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $fieldTypes = $em->getRepository('MyFrontendBundle:FieldTypes')->findAll();

        return $this->render('fieldtypes/index.html.twig', array(
            'fieldTypes' => $fieldTypes,
        ));
    }

    /**
     * Creates a new FieldTypes entity.
     *
     * @Route("/new", name="fieldtypes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $fieldType = new FieldTypes();
        $form = $this->createForm('MyFrontendBundle\Form\FieldTypesType', $fieldType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fieldType);
            $em->flush();

            return $this->redirectToRoute('fieldtypes_show', array('id' => $fieldType->getId()));
        }

        return $this->render('fieldtypes/new.html.twig', array(
            'fieldType' => $fieldType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a FieldTypes entity.
     *
     * @Route("/{id}", name="fieldtypes_show")
     * @Method("GET")
     */
    public function showAction(FieldTypes $fieldType)
    {
        $deleteForm = $this->createDeleteForm($fieldType);

        return $this->render('fieldtypes/show.html.twig', array(
            'fieldType' => $fieldType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing FieldTypes entity.
     *
     * @Route("/{id}/edit", name="fieldtypes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, FieldTypes $fieldType)
    {
        $deleteForm = $this->createDeleteForm($fieldType);
        $editForm = $this->createForm('MyFrontendBundle\Form\FieldTypesType', $fieldType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fieldType);
            $em->flush();

            return $this->redirectToRoute('fieldtypes_edit', array('id' => $fieldType->getId()));
        }

        return $this->render('fieldtypes/edit.html.twig', array(
            'fieldType' => $fieldType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a FieldTypes entity.
     *
     * @Route("/{id}", name="fieldtypes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, FieldTypes $fieldType)
    {
        $form = $this->createDeleteForm($fieldType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fieldType);
            $em->flush();
        }

        return $this->redirectToRoute('fieldtypes_index');
    }

    /**
     * Creates a form to delete a FieldTypes entity.
     *
     * @param FieldTypes $fieldType The FieldTypes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FieldTypes $fieldType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fieldtypes_delete', array('id' => $fieldType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
