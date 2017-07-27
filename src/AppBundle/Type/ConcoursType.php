<?php
/**
 * Created by PhpStorm.
 * User: colin
 * Date: 27/07/2017
 * Time: 10:23
 */

namespace AppBundle\Type;

use AppBundle\Entity\Concours;
use AppBundle\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class ConcoursType extends AbstractType
{
    public  function  buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('Titre',TextType::class)
            ->add('Date', DateTimeType::class)
            ->add('Instrument', ChoiceType::class, array(
                'choices'  => array(
                    'vide' =>'vide',
                    'vide' => 'vide',
                )))
            ->add('Participants', CollectionType::class, array(
                'entry_type' => UtilisateurType::class,
                'allow_add'    => true,
                'by_reference' => false,
            ));

    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' =>Concours::class,
        ));
    }
}