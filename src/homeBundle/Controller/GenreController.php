<?php

namespace homeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type as Type;
use Symfony\Component\HttpFoundation\Request;
use homeBundle\Entity\Genre;

class GenreController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $genres = $em->getRepository("homeBundle:Genre")->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $genres,
            $this->get('request')->query->get('page', 1),
            30
        );

        return $this->render('homeBundle:Genre:genreIndex.html.twig', ['genres' => $pagination]);
    }



    public function createGenreAction(Request $request)
    {
        $genre = new Genre();

        $formGenre = $this  ->createForm('homeBundle\Form\FormGenreType', $genre)
                            ->add('ajouter', Type\SubmitType::class);

        $formGenre->handleRequest($request);

        if($formGenre->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($genre);
            $em->flush();

            $session = $request->getSession();
            $session->getFlashBag()->add("success_create", "La catégorie ". "<strong>".$genre->getNom()."</strong>"." a bien été ajoutée à la base");

            return $this->redirectToRoute('genre_homepage');
        }

        return $this->render('homeBundle:Genre:genreCreate.html.twig', ['formGenre' => $formGenre->createView()]);
    }


    public function editAction(Request $request, Genre $genre)
    {
        $deleteForm = $this->createDeleteForm($genre);

        $editGenreForm = $this  ->createForm('homeBundle\Form\FormGenreType', $genre)
                                ->add('modifier', Type\SubmitType::class);

        $editGenreForm->handleRequest($request);

        if($editGenreForm->isSubmitted() && $editGenreForm->isValid())
        {

            $em = $this->getDoctrine()->getManager();
            $em->persist($genre);
            $em->flush();

            $session = $request->getSession();
            $session->getFlashBag()->add("success_edit", "La catégorie ". "<strong>".$genre->getNom()."</strong>"." a bien été modifiée à la base");

            return $this->redirectToRoute('genre_homepage');
        }

        return $this->render('homeBundle:Genre:genreEdit.html.twig', array(
            'genre' => $genre,
            'editGenreForm' => $editGenreForm->createView(),
            'delete_form' => $deleteForm->createView()));
    }



    public function deleteAction(Request $request, Genre $genre)
    {

        $em = $this->getDoctrine()->getManager();

        $em->remove($genre);
        $em->flush();

        $session = $request->getSession();
        $session->getFlashBag()->add("success_delete", "La catégorie ". "<strong>".$genre->getNom()."</strong>"." a bien été supprimée de la base");

        return $this->redirectToRoute('genre_homepage');
    }



    /**
     * Creates a form to delete a Genre entity.
     *
     * @param Genre $genre The Genre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Genre $genre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('genre_delete_homepage', array('id' => $genre->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}