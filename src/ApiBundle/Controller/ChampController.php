<?php

namespace ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class ChampController extends FOSRestController
{
    public function getChampsAction()
    {
        $data = $this->getDoctrine()
            ->getRepository('ApiBundle:Champion')
            ->findAll();
        $view = $this->view($data, 200)
            ->setTemplate("ApiBundle:getUsers.html.twig")
            ->setTemplateVar('users')
        ;

        return $this->handleView($view);
    }

    public function redirectAction()
    {
        $view = $this->redirectView($this->generateUrl('some_route'), 301);
        // or
        $view = $this->routeRedirectView('some_route', array(), 301);

        return $this->handleView($view);
    }
}
