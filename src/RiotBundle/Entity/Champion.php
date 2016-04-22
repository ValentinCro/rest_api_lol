<?php

namespace RiotBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Champion
 *
 * @ORM\Table(name="champion")
 * @ORM\Entity(repositoryClass="RiotBundle\Repository\ChampionRepository")
 */
class Champion
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
     * @ORM\Column(name="idRiot", type="integer", unique=true)
     */
    private $idRiot;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=80, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="imageLoader", type="string", length=40)
     */
    private $imageLoader;


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
     * Set idRiot
     *
     * @param integer $idRiot
     *
     * @return Champion
     */
    public function setIdRiot($idRiot)
    {
        $this->idRiot = $idRiot;

        return $this;
    }

    /**
     * Get idRiot
     *
     * @return int
     */
    public function getIdRiot()
    {
        return $this->idRiot;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Champion
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Champion
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set imageLoader
     *
     * @param string $imageLoader
     *
     * @return Champion
     */
    public function setImageLoader($imageLoader)
    {
        $this->imageLoader = $imageLoader;

        return $this;
    }

    /**
     * Get imageLoader
     *
     * @return string
     */
    public function getImageLoader()
    {
        return $this->imageLoader;
    }
}

