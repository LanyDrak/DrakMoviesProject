<?php

namespace frontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type as Type;

class NewsController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $news = $em->getRepository("homeBundle:News")->findAll();

        return $this->render('frontBundle:Default:news.html.twig', ['news' => $news]);
    }

}