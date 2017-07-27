<?php
/**
 * Created by PhpStorm.
 * User: colin
 * Date: 27/07/2017
 * Time: 10:23
 */

namespace AppBundle\Type;

use AppBundle\Entity\Concours;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConcoursType extends AbstractType
{
    public  function  buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('titre')
            ->add('description')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('ville')
            ->add('adresse')
            ->add('cp')
            ->add('visibilite')
            ->add('utilisateurs', EntityType::class, array(
                'class' => 'AppBundle:Utilisateur',
                'choice_label' => 'nom',
                'mapped' => false,
            ));

    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' =>Concours::class,
        ));
    }
}