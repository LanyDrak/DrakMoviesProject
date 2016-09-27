<?php

namespace homeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type as Type;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', Type\ChoiceType::class, array(
                'choices'  => array(
                    0 => 'Homme',
                    1 => 'Femme'
                ),
                'expanded'  => true,
                'multiple'  => false,
                ))
            ->add('login', Type\TextType::class)
            ->add('email')
            ->add('password')
            ->add('dateDeNaissance', Type\DateType::class,
                [
                    "years" => range(date('Y')-80,date('Y')),
                ])
            ->add('phone', Type\NumberType::class)
            ->add('userRole', EntityType::class, [
                'class' => 'homeBundle:UserRole',
                'property' => 'nom',
                'expanded'  => false,
                'multiple'  => false,
                'query_builder' =>  function (EntityRepository $er)
                {
                    return $er  ->createQueryBuilder('ur')
                        ->orderBy('ur.nom', 'ASC');
                },
            ])
            ->add('contribution', Type\TextType::class)
            ->add('file', Type\FileType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'homeBundle\Entity\User'
        ));
    }
}
