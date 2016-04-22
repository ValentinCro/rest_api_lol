<?php

namespace RiotBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RiotBundle:Default:index.html.twig');
    }
}
