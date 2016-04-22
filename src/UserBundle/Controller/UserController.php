<?php

namespace UserBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class UserController extends FOSRestController
{
    public function getUsersAction()
    {
        $data = $this->getDoctrine()
            ->getRepository('UserBundle:User')
            ->findAll();
        $users = array();

        foreach($data as $user) {
            $tmp = array();
            array_push($tmp, $user->getId());
            array_push($tmp, $user->getLogin());
            array_push($users, $tmp);
        }
        return $users;
    }

    public function getUsersIdAction($id)
    {
        $data = $this->getDoctrine()
            ->getRepository('UserBundle:User')
            ->findOneBy(array('id' => $id));

        $tmp = array();
        array_push($tmp, $data->getId());
        array_push($tmp, $data->getLogin());

        return $tmp;
    }

    public function getUsersLoginAction($login)
    {
        $data = $this->getDoctrine()
            ->getRepository('UserBundle:User')
            ->findOneBy(array('login' => $login));

        $tmp = array();
        array_push($tmp, $data->getId());
        array_push($tmp, $data->getLogin());

        return $tmp;
    }

    public function postVerifLoginAction($login, $password) {
        $pass = sha1($password);
        $data = $this->getDoctrine()
            ->getRepository('UserBundle:User')
            ->findOneBy(array('login' => $login, 'password' => $pass));
        if (count($data) > 0) {
            return true;
        }
        return false;
    }

    public function redirectAction()
    {
        $view = $this->redirectView($this->generateUrl('some_route'), 301);
        // or
        $view = $this->routeRedirectView('some_route', array(), 301);

        return $this->handleView($view);
    }
}
