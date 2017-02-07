<?php

namespace frontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type as Type;

class NewsController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $newInfos = $em->getRepository("homeBundle:NewInfo")->findAll();
        $films = $em->getRepository("homeBundle:Film")->findAll();

        return $this->render('frontBundle:Default:news.html.twig', ['newInfos' => $newInfos, 'films' => $films]);
        
    }

}