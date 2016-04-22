<?php
// src/UserBundle/DataFixtures/ORM/LoadUserData.php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager) {
        $users = array();

        $user = new User();

        $user->setLogin('nephi');
        $user->setPassword('82cb479588e40b786994f08f12c2699ee915f89f');
        $user->setMail('val766@hotmail.fr');
        $user->setRole(1);

        $users[] = $user;

        $user = new User();

        $user->setLogin('amine');
        $user->setPassword('23bc6df7647b818d79ce7fc43fa0f460c188205a');
        $user->setRole(0);

        $users[] = $user;

        $user = new User();

        $user->setLogin('rddu76');
        $user->setPassword('e18640aba45d7b82629e52ca81ad0406156be1b9');
        $user->setRole(0);

        $users[] = $user;

        $user = new User();

        $user->setLogin('underset');
        $user->setPassword('29475197ed29d53f3e56cfa4eb719e926b55c0e5');
        $user->setRole(0);

        $users[] = $user;

        $user = new User();

        $user->setLogin('RammfanTheOne');
        $user->setPassword('068d7a11820617cb3caef7da070acf6dbedf39f1');
        $user->setMail('rammfantheone@gmail.com');
        $user->setRole(0);

        $users[] = $user;

        foreach ($users as $user) {
            $manager->persist($user);
        }
        $manager->flush();
    }

    public function getOrder() {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}