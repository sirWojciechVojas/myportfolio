<?php

namespace App\Listener;

use Symfony\Component\HttpFoundation\RequestStack;

class LoginListener
{
    public function __construct(private RequestStack $requestStack)
    {}

    public function onSecurityAuthenticationSuccess()
    {
        $this->requestStack->getCurrentRequest()->getSession()->getFlashBag()->add('success', 'Bienvenue');
    }
}