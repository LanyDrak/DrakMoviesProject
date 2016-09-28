<?php

namespace homeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type as Type;
use Symfony\Component\HttpFoundation\Request;
use homeBundle\Entity\Film;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class FilmController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $films = $em->getRepository("homeBundle:Film")  ->allFilmsbyDate();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $films,
            $this->get('request')->query->get('page', 1),
            25
        );

        return $this->render('homeBundle:Film:index.html.twig', ['films' => $pagination]);
    }

    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $film = $em->getRepository("homeBundle:Film")->find($id);

        return $this->render('homeBundle:Film:filmShow.html.twig', ['film' => $film]);
    }

    public function showByNameAction($nom)
    {
        $em = $this->getDoctrine()->getManager();
        $film = $em->getRepository("homeBundle:Film")->findOneByNom($nom);

        return $this->render('homeBundle:Film:filmShow.html.twig', ['film' => $film]);
    }

    public function showByPoster($id)
    {
        $em = $this->getDoctrine()->getManager();
        $film = $em->getRepository("homeBundle:Film")->findOneByNom($id);

        return $this->render('homeBundle:Film:filmShow.html.twig', ['film' => $film]);
    }


    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function editAction(Request $request, Film $film)
    {
        $deleteForm = $this->createDeleteForm($film);

        $editFormFilm = $this   ->createForm('homeBundle\Form\FormFilmType', $film)
                                ->add('file', Type\FileType::class, ['required' => false])
                                ->add('modifier', Type\SubmitType::class);

        $editFormFilm->handleRequest($request);

        if($editFormFilm->isSubmitted() && $editFormFilm->isValid())
        {

            // $film->upload();

            $em = $this->getDoctrine()->getManager();
            $em->persist($film);
            $em->flush();

            $session = $request->getSession();
            $session->getFlashBag()->add("success_edit", "Le film ". "<strong>".$film->getNom()."</strong>"." a bien été modifié à la base");

            return $this->redirectToRoute('film_homepage');
        }

        return $this->render('homeBundle:Film:filmEdit.html.twig', array(
            'film' => $film,
            'editFormFilm' => $editFormFilm->createView(),
            'delete_form' => $deleteForm->createView()));
    }


    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteAction(Request $request, Film $film)
    {

        $em = $this->getDoctrine()->getManager();

        /* $film = $em->getRepository("homeBundle:Film")->find($film);

        if ($film->getAffiche())
        {
            die(dump($film->getAbsolutePath()));
            unlink($film->getAbsolutePath());
        }*/

        $em->remove($film);
        $em->flush();

        $session = $request->getSession();
        $session->getFlashBag()->add("success_delete", "Le film ". "<strong>".$film->getNom()."</strong>"." a bien été supprimé de la base");

        return $this->redirectToRoute('film_homepage');
    }


    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function createAction(Request $request)
    {
        $film = new Film();

        $formFilm = $this   ->createForm('homeBundle\Form\FormFilmType', $film)
                            ->add('ajouter', Type\SubmitType::class);

        $formFilm->handleRequest($request);

        if($formFilm->isValid())
        {

            // $film->upload();

            $em = $this->getDoctrine()->getManager();
            $em->persist($film);
            $em->flush();

            $session = $request->getSession();
            $session->getFlashBag()->add("success_create", "Le film ". "<strong>".$film->getNom()."</strong>"." a bien été ajouté à la base");

            return $this->redirectToRoute('film_homepage');
        }

        return $this->render('homeBundle:Film:filmCreate.html.twig', ['formFilm' => $formFilm->createView()]);
    }

    /**
     * Creates a form to delete a Movie entity.
     *
     * @param Movie $movie The Movie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Film $film)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('film_delete_homepage', array('id' => $film->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}