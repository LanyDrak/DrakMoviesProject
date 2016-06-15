<?php

namespace homeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type as Type;

class UserController extends Controller
{
    public function getUserInfosAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('homeBundle:User')->findOneBy($id);

        return $this->render("homeBundle:Default:renderUsers.html.twig", ['users' => $users]);
    }
}