<?php

namespace homeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type as Type;
use Symfony\Component\HttpFoundation\Request;
use homeBundle\Entity\Acteur;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class ActeurController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $acteurs = $em->getRepository("homeBundle:Acteur")->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $acteurs,
            $this->get('request')->query->get('page', 1),
            25
        );

        return $this->render('homeBundle:Acteur:index.html.twig', ['acteurs' => $pagination]);
    }

    public function showActeurAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $acteur = $em->getRepository("homeBundle:Acteur")->find($id);

        return $this->render('homeBundle:Acteur:acteurShow.html.twig', ['acteur' => $acteur]);
    }


    public function showByNameAction($nom)
    {
        $em = $this->getDoctrine()->getManager();
        $acteur = $em->getRepository("homeBundle:Acteur")->findOneByNom($nom);

        return $this->render('homeBundle:Acteur:acteurShow.html.twig', ['acteur' => $acteur]);
    }


    public function showByPoster($id)
    {
        $em = $this->getDoctrine()->getManager();
        $acteur = $em->getRepository("homeBundle:Acteur")->findOneByNom($id);

        return $this->render('homeBundle:Acteur:acteurShow.html.twig', ['acteur' => $acteur]);
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function createActeurAction(Request $request)
    {
        $acteur = new Acteur();

        $formActeur = $this     ->createForm('homeBundle\Form\FormActeurType', $acteur)
                                ->add('ajouter', Type\SubmitType::class);

        $formActeur->handleRequest($request);

        if($formActeur->isValid())
        {
            //$acteur->upload();

            $em = $this->getDoctrine()->getManager();
            $em->persist($acteur);
            $em->flush();

            $session = $request->getSession();
            $session->getFlashBag()->add("success_create", "L'acteur ". "<strong>".$acteur->getPrenom()." ".$acteur->getNom()."</strong>"." a bien été ajouté à la base");

            return $this->redirectToRoute('acteur_homepage');
        }

        return $this->render('homeBundle:Acteur:acteurCreate.html.twig', ['formActeur' => $formActeur->createView()]);
    }


    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function editAction(Request $request, Acteur $acteur)
    {
        $deleteForm = $this->createDeleteForm($acteur);

        $editFormActeur = $this   ->createForm('homeBundle\Form\FormActeurType', $acteur)
            ->add('file', Type\FileType::class, ['required' => false])
            ->add('modifier', Type\SubmitType::class);

        $editFormActeur->handleRequest($request);

        if($editFormActeur->isSubmitted() && $editFormActeur->isValid())
        {

            // $acteur->upload();


            $em = $this->getDoctrine()->getManager();
            $em->persist($acteur);
            $em->flush();

            $session = $request->getSession();
            $session->getFlashBag()->add("success_edit", "L'acteur ". "<strong>".$acteur->getPrenom()." ".$acteur->getNom()."</strong>"." a bien été modifié à la base");

            return $this->redirectToRoute('acteur_homepage');
        }

        return $this->render('homeBundle:Acteur:acteurEdit.html.twig', array(
            'acteur' => $acteur,
            'editFormActeur' => $editFormActeur->createView(),
            'delete_form' => $deleteForm->createView()));
    }


    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteAction(Request $request, Acteur $acteur)
    {

        $em = $this->getDoctrine()->getManager();

        $em->remove($acteur);
        $em->flush();

        $session = $request->getSession();
        $session->getFlashBag()->add("success_delete", "L'acteur ". "<strong>".$acteur->getPrenom()." ".$acteur->getNom()."</strong>"." a bien été supprimé de la base");

        return $this->redirectToRoute('acteur_homepage');
    }




    public function apiGetActorListFROMAction()
    {
        // #############################################
        // ############### DONNEES DE L'API TMDB#######
        // #############################################
        // https://www.themoviedb.org/documentation/api

        $ch = \curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=5eeb6dc76230d81a64b74482e6c3b7f6');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json')); // Assuming you're requesting JSON
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);

        // Decode JSON
        $results = json_decode($response, true);

        // On travaille sur le tableau results
        $results = $results['results'];

        dump($results);

        return new Response();
    }




    public function api_getActorListAction()
    {
        $em = $this->getDoctrine()->getManager();

        $encoders = array(new JsonEncoder());

        $normalizers = array(new ObjectNormalizer());

        $normalizers[0]->setCircularReferenceHandler(function ($object)
        {
            return $object->getName();
        });

        $serializer = new Serializer($normalizers, $encoders);
        $acteurs = $em->getRepository('homeBundle:Acteur')->findAll();
        $array = $serializer->serialize($acteurs, 'json');

        $response = new Response($array);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


    /**
     * Creates a form to delete a Acteur entity.
     *
     * @param Acteur $acteur The Acteur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Acteur $acteur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('acteur_delete_homepage', array('id' => $acteur->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}