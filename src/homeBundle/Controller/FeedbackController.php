<?php

namespace homeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type as Type;
use Symfony\Component\HttpFoundation\Request;
use homeBundle\Entity\Feedback;

class FeedbackController extends Controller
{
    public function feedbackAction(Request $request)
    {
        $feedback = new Feedback();
        $formFeedback = $this->createFormBuilder($feedback)
            ->add('lastname', Type\TextType::class)
            ->add('firstname', Type\TextType::class)
            ->add('select', Type\ChoiceType::class, array(
                'choices'  => array(
                    0 => 'Bug',
                    1 => 'Annotation',
                    2 => 'Translate',
                    3 => 'Autre'
                )
            ))
            ->add('email', Type\EmailType::class )
            ->add('message_perso', Type\TextareaType::class)
            ->add('file', Type\FileType::class)
            ->add('newsletter', Type\CheckboxType::class)
            ->add('Send', Type\SubmitType::class)
            ->getForm();

        $formFeedback->handleRequest($request);

        if ($formFeedback->isValid())
        {
            $feedback->upload();

            $attachment = \Swift_Attachment::fromPath($feedback->getWebPath() . $feedback->getFile());

            $lastName = $formFeedback->get('lastname')->getData();
            $firstName = $formFeedback->get('firstname')->getData();
            $select = $formFeedback->get('select')->getData();
            $email = $formFeedback->get('email')->getData();
            $messagePerso = $formFeedback->get('message_perso')->getData();
            $newsletter = $formFeedback->get('newsletter')->getData();

            $message = \Swift_Message::newInstance()
                ->setSubject('To do ASAP !')
                ->setFrom('lebron.james@cleveland-cavaliers.com')
                ->setTo('aaaat@example.com')
                ->setBody(
                    $this->renderView('homeBundle:Default:mail.html.twig', ['firstname' => $firstName,
                                                                            'lastname' => $lastName,
                                                                            'select' => $select,
                                                                            'email' => $email,
                                                                            'message_perso' => $messagePerso,
                                                                            'newsletter'=> $newsletter]),
                    'text/html'
                )
                ->addPart(
                    $this->renderView('homeBundle:Default:mail.txt.twig', ['firstname' => $firstName,
                                                                            'lastname' => $lastName,
                                                                            'select' => $select,
                                                                            'email' => $email,
                                                                            'message_perso' => $messagePerso,
                                                                            'newsletter'=> $newsletter]),
                    'text/plain'
                )
                ->attach($attachment)
            ;

            $this->get('mailer')->send($message);

            if ($feedback->getFile() !== null) {
                $feedback->upload(); // Appel de la fonction d'upload
            }

            $session = $request->getSession();
            $session->getFlashBag()->add('success_mail', 'Votre feedback a bien été envoyé ');
            return $this->redirectToRoute('feedback_homepage');
        }

        return $this->render('homeBundle:Contact:feedback.html.twig', ['formFeedback' => $formFeedback->createView()
        ]);
    }
}