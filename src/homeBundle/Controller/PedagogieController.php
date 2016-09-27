<?php

namespace homeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PedagogieController extends Controller
{
        public function translationAction($term)
        {
           return $this->render('homeBundle:Default:pedagogie.html.twig', ['term' => $term]);
        }
}
