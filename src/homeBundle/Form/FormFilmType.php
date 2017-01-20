<?php

namespace homeBundle\Form;

use homeBundle\Repository\ActeurRepository;
use homeBundle\Repository\UserRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type as Type;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class FormFilmType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', Type\TextType::class)
            ->add('file', Type\FileType::class)
            ->add('pays', Type\TextType::class)
            ->add('director', Type\TextType::class)
            ->add('genre', EntityType::class, [
                'class' => 'homeBundle:Genre',
                'property' => 'nom',
                'expanded'  => false,
                'multiple'  => false,
                'query_builder' =>  function (EntityRepository $er)
                                    {
                                        return $er  ->createQueryBuilder('g')
                                                    ->orderBy('g.nom', 'ASC');
                                    },
            ])
            ->add('dateSortie', Type\DateType::class,
                [
                    "years" => range(date('Y')-80,date('Y')),
                ])
            ->add('budget', Type\NumberType::class)
            ->add('synopsis', Type\TextareaType::class)
            ->add('acteurs', EntityType::class, array(
                'class' => 'homeBundle:Acteur',
                'choice_label' => 'nom',
                'multiple' => true,
                'by_reference' => false,
                'query_builder' =>  function (ActeurRepository $er)
                {
                    return $er->getActeurOrderByNomBuilder();
                }
            ))
            ->add('boxOfficeFrance', Type\NumberType::class)
            ->add('numVisa', Type\NumberType::class)
            ->add('duree', Type\NumberType::class)
            ->add('trailer', Type\TextType::class)
            ->add('frontThumbnail', Type\TextType::class)
            ->add('published', Type\CheckboxType::class)

            ->add('reviewN6nikita', Type\TextareaType::class, array('attr' => array('onkeyup' => 'restN6nikita(this.value);', 'rows' => '10'),))
            ->add('noteN6Nikita', Type\ChoiceType::class, array(
                'choices'  => array(
                    0 => '0',
                    1 => '1',
                    2 => '2',
                    3 => '3',
                    4 => '4',
                    5 => '5',
                ),
                'expanded'  => false,
                'multiple'  =>false,
            ))
            ->add( "reviewN6tyrell", Type\TextareaType::class, array('attr' => array('onkeyup' => 'restN6tyrell(this.value);', 'rows' => '10'),))
            ->add('noteN6Tyrell', Type\ChoiceType::class, array(
                'choices'  => array(
                    0 => '0',
                    1 => '1',
                    2 => '2',
                    3 => '3',
                    4 => '4',
                    5 => '5',
                ),
                'expanded'  => false,
                'multiple'  =>false,
            ))
            ->add('reviewN6marzoni', Type\TextareaType::class, array('attr' => array('onkeyup' => 'restN6marzoni(this.value);', 'rows' => '10'),))
            ->add('noteN6Marzoni', Type\ChoiceType::class, array(
                'choices'  => array(
                    0 => '0',
                    1 => '1',
                    2 => '2',
                    3 => '3',
                    4 => '4',
                    5 => '5',
                ),
                'expanded'  => false,
                'multiple'  =>false,
            ))
            ->add('reviewN6palm', Type\TextareaType::class, array('attr' => array('onkeyup' => 'restN6palm(this.value);', 'rows' => '10'),))
            ->add('noteN6Palm', Type\ChoiceType::class, array(
                'choices'  => array(
                    0 => '0',
                    1 => '1',
                    2 => '2',
                    3 => '3',
                    4 => '4',
                    5 => '5',
                ),
                'expanded'  => false,
                'multiple'  =>false,
            ));

    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'homeBundle\Entity\Film'
        ));
    }
}