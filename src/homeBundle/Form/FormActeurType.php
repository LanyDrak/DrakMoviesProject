<?php

namespace homeBundle\Form;

use homeBundle\Repository\FilmRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type as Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class FormActeurType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', Type\TextType::class)
            ->add('prenom', Type\TextType::class)
            ->add('file', Type\FileType::class)
            ->add('dateNaissance', Type\DateType::class,
                [
                    "years" => range(date('Y')-80,date('Y')),
                ])
            ->add('nationalite', Type\TextType::class)
            ->add('bio', Type\TextareaType::class)
            ->add('films', EntityType::class, array(
                            'class' => 'homeBundle:Film',
                            'choice_label' => 'nom',
                            'multiple' => true,
                            'query_builder' =>  function (FilmRepository $er)
                                                {
                                                    return $er->getFilmOrderByNomBuilder();
                                                }
            ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'homeBundle\Entity\Acteur'
        ));
    }
}