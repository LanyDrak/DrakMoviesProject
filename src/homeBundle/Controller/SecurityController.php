<?php

namespace homeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type as Type;
use homeBundle\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


/**
 * Class SecurityController.
 */
class SecurityController extends Controller
{
    /**
     * Page Login.
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'homeBundle:Security:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }


    public function createUserAction(Request $request)
    {
        $user = new User();

        $formUser = $this  ->createForm('homeBundle\Form\UserType', $user)
                            ->add('ajouter', Type\SubmitType::class);

        $formUser->handleRequest($request);

        if($formUser->isValid())
        {
            $em = $this->getDoctrine()->getManager();

            // Hash password
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($user);
            $newPassword = $encoder->encodePassword($user->getPassword(), $user->getSalt());

            $user->setPassword($newPassword);
            $em->persist($user);
            $em->flush();

            // Connecte l'utilisateur automatiquement
            $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
            $this->get('security.token_storage')->setToken($token);

            return $this->redirectToRoute('home_homepage');
        }

        return $this->render('homeBundle:Default:UserCreate.html.twig', ['formUser' => $formUser->createView()]);
    }
}