<?php

namespace frontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $films = $em->getRepository("homeBundle:Film")->allFilmsbyDate();

        return $this->render('frontBundle:Default:index.html.twig', ['films' => $films]);
    }

    public function indexActionLast5()
    {
        $em = $this->getDoctrine()->getManager();
        $last5Films = $em->getRepository("homeBundle:Film")->last5Films();

        return $this->render('frontBundle:Default:index.html.twig',['last5Films'  => $last5Films]);
    }
}
