<?php

namespace AppBundle\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AppBundle\Entity\Contact;

class ContactType extends  AbstractType
{
    public  function  buildForm(FormBuilderInterface $builder, array $options){
    $builder->add('Nom',TextType::class)
        ->add('Prenom', TextType::class)
        ->add('Mail', EmailType::class)
        ->add('Sujet', ChoiceType::class, array(
            'choices'  => array(
                'Bagad' =>'Bagad',
                'Badagig' => 'Badadig',
            )))
        ->add('Message', TextareaType::class);
}
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Contact::class,
        ));
    }
}