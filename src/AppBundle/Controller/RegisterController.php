<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends BaseController
{
    public function registerAction(Request $request)
    {
        $dispatcher = $this->get('event_dispatcher');
        $dispatcher->addRole(true);
    }
}
