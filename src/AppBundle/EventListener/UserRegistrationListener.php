<?php

namespace AppBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 27/07/2017
 * Time: 16:12
 */
class UserRegistrationListener implements EventSubscriberInterface
{


    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [FOSUserEvents::REGISTRATION_SUCCESS => 'onUserRegistrationSuccess'];
    }

    public function onUserRegistrationSuccess(FormEvent $event)
    {
        $form = $event->getForm();

        $user = $form->get("roles")->getData();
        
    }
}