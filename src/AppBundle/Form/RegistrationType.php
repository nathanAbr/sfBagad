<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 26/07/2017
 * Time: 14:09
 */

namespace AppBundle\Form;

use AppBundle\Entity\Utilisateur;
use FOS\UserBundle\Model\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('date_naissance', DateType::class, array(
                'widget' => 'single_text'
            ))
            ->add('adresse', TextType::class)
            ->add('cp', TextType::class)
            ->add('ville', TextType::class)
            ->add('cotisation', CheckboxType::class, array(
                'label' => 'Cotisation payée (cochez si oui)',
                'required' => false,
            ))
            ->add('instrument', EntityType::class, array(
                'class' => 'AppBundle:Instrument',
                'choice_label' => 'libelle',
            ))
            ->add('roles', CollectionType::class, array(
                'entry_type'   => ChoiceType::class,
                'entry_options'  => array(
                    'choices'  => array(
                        'Admin' => 'ROLE_ADMIN',
                        'User' => 'ROLE_MEMBRE',
                    ),
                ),
            ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getInstrument()
    {
        return $this->getBlockPrefix();
    }
}