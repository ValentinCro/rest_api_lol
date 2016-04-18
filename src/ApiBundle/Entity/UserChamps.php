<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserChamps
 *
 * @ORM\Table(name="user_champs")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\UserChampsRepository")
 */
class UserChamps
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="idUser", type="integer")
     */
    private $idUser;

    /**
     * @var int
     *
     * @ORM\Column(name="idChamp", type="integer")
     */
    private $idChamp;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return UserChamps
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idChamp
     *
     * @param integer $idChamp
     *
     * @return UserChamps
     */
    public function setIdChamp($idChamp)
    {
        $this->idChamp = $idChamp;

        return $this;
    }

    /**
     * Get idChamp
     *
     * @return int
     */
    public function getIdChamp()
    {
        return $this->idChamp;
    }
}

