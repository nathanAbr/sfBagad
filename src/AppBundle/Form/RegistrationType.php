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
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AppBundle\Type\ConcoursType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('date_naissance', DateType::class)
            ->add('adresse', TextType::class)
            ->add('cp', TextType::class)
            ->add('ville', TextType::class)
            ->add('cotisation', CheckboxType::class, array(
                'label' => 'Cotisation payée ?',
                'required' => false,
            ))
            ->add('instrument', EntityType::class, array(
                'class' => 'AppBundle:Instrument',
                'choice_label' => 'libelle',
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