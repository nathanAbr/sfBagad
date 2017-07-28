<?php

namespace AppBundle\Type;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConcoursType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    { $builder->add('titre')
        ->add('description')
        ->add('dateDebut')
        ->add('dateFin')
        ->add('ville')
        ->add('adresse')
        ->add('cp')
        ->add('visibilite')
        ->add('important')
        ->add('utilisateurs', EntityType::class, array(
            'class' => 'AppBundle:Utilisateur',
            'choice_label' => 'nom',
            'mapped' => false,
        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Concours'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_concours';
    }


}
